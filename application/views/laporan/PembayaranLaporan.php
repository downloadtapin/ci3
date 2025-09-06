<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .printable,
            .printable * {
                visibility: visible;
            }
            .printable {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 20px;
                background: #fff;
            }
            .btn {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">LAPORAN PEMBAYARAN</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div id="notifPembayaran" class="alert" style="display:none;"></div>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No Pemilihan</th>
                                <th>Nilai Kontrak</th>
                                <th>Nama Paket</th>
                                <th>Pokja Pemilihan</th>
                                <th>Tanggal</th>
                                <th>Nama Penyedia</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pemilihans as $pemilihan): ?>
                            <tr>
                                <td class="no-pemilihan"><?= $pemilihan->No_Pemilihan ?></td>
                                <td class="nilai-kontrak">
                                    <?php 
                                        foreach ($negosiasis as $negosiasi) {
                                            if ($negosiasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                echo $negosiasi->harga_negosiasi;
                                                break;
                                            }
                                        }
                                    ?>
                                </td>
                                <td class="nama-paket">
                                    <?php 
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                foreach ($pakets as $paket) {
                                                    if ($paket->Id_kode_tender == $evaluasi->Id_kode_tender) {
                                                        echo $paket->Nama_tender;
                                                        break;
                                                    }
                                                }
                                                break;
                                            }
                                        }
                                    ?>
                                </td>
                                <td class="pokja-pemilihan">
                                    <?php 
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                foreach ($pakets as $paket) {
                                                    if ($paket->Id_kode_tender == $evaluasi->Id_kode_tender) {
                                                        echo $paket->Pokja_pemilihan;
                                                        break;
                                                    }
                                                }
                                                break;
                                            }
                                        }
                                    ?>
                                </td>
                                <td class="tanggal"><?= $pemilihan->Tanggal ?></td>
                                <td class="nama-penyedia">
                                    <?php 
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                echo $evaluasi->nama_Penyedia;
                                                break;
                                            }
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sudah_bayar = $this->db->get_where('pembayaran', [
                                        'id_paket' => $pemilihan->Id_paket,
                                        'status' => 1
                                    ])->row();
                                    ?>
                                    <?php if ($sudah_bayar): ?>
                                    <button type="button" class="btn btn-info btn-buka"
                                        data-id="<?= $pemilihan->Id_paket ?>">Buka</button>
                                    <?php else: ?>
                                    <button type="button" class="btn btn-success btn-bayar"
                                        data-id="<?= $pemilihan->Id_paket ?>">Bayar</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>
    // === Fungsi Format Rupiah ===
    function formatRupiah(angka) {
        if (angka === null || angka === undefined || angka === "") return "0,00";
        var number = parseFloat(angka).toFixed(2); 
        var parts = number.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        return parts.join(",");
    }

    $(document).ready(function() {
        var table = $('#example').DataTable();

        // === TOMBOL BAYAR ===
        $('#example tbody').on('click', '.btn-bayar', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            table.rows().every(function() {
                if (this.child.isShown()) {
                    this.child.hide();
                    $(this.node()).removeClass('shown');
                }
            });

            var namaPaket = tr.find('.nama-paket').text();
            var nilaiKontrak = tr.find('.nilai-kontrak').text();
            var kontrak = parseFloat(nilaiKontrak.replace(/\./g, '').replace(',', '.')) || 0;

            var childHtml = `
                <div class="card mt-2" data-id="${$(this).data('id')}">
                    <div class="card-body">
                        <h5>Pembayaran</h5>
                        <form class="form-pembayaran">
                            <input type="hidden" class="inputIdPaket" value="${$(this).data('id')}">
                            <div class="form-group">
                                <label>Nama Paket</label>
                                <input type="text" class="form-control" value="${namaPaket}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nilai Kontrak</label>
                                <input type="text" class="form-control nilai-kontrak" value="${formatRupiah(kontrak)}" readonly>
                            </div>
                            <div class="form-group">
                                <label>PPN</label>
                                <input type="number" class="form-control ppn" value="0">
                            </div>
                            <div class="form-group">
                                <label>PPH</label>
                                <input type="number" class="form-control pph" value="0">
                            </div>
                            <div class="form-group">
                                <label>Total</label>
                                <input type="text" class="form-control total" value="Rp ${formatRupiah(kontrak)}" readonly>
                            </div>
                            <button type="button" class="btn btn-success btn-bayar-accordion">Proses Bayar</button>
                            <button type="button" class="btn btn-secondary btn-batal-accordion">Batal</button>
                        </form>
                    </div>
                </div>
            `;
            row.child(childHtml).show();
            tr.addClass('shown');
        });

        // === UPDATE TOTAL ===
        $(document).on('input', '.ppn, .pph', function() {
            var form = $(this).closest('form');
            var nilaiKontrak = form.find('.nilai-kontrak').val();
            var kontrak = parseFloat(nilaiKontrak.replace(/\./g, '').replace(',', '.')) || 0;
            var ppn = parseFloat(form.find('.ppn').val()) || 0;
            var pph = parseFloat(form.find('.pph').val()) || 0;
            var total = kontrak - ppn - pph;
            form.find('.total').val('Rp ' + formatRupiah(total));
        });

        // === PROSES BAYAR ===
        $(document).on('click', '.btn-bayar-accordion', function() {
            var card = $(this).closest('.card');
            var form = card.find('form');

            var id_paket = form.find('.inputIdPaket').val();
            var ppn = form.find('.ppn').val() || 0;
            var pph = form.find('.pph').val() || 0;
            var total = form.find('.total').val().replace(/[^0-9,-]/g, '').replace('.', '').replace(',', '.');

            var tr = card.closest('tr').prev();
            var btnBayar = tr.find('.btn-bayar');
            var namaPaket = tr.find('.nama-paket').text();
            var penyedia = tr.find('.nama-penyedia').text();
            var tanggal = tr.find('.tanggal').text();

            $.post('<?= site_url('Pembayaran/proses_bayar') ?>', {
                id_paket: id_paket,
                ppn: ppn,
                pph: pph,
                total: total
            }, function(response) {
                var res = JSON.parse(response);
                if (res.success) {
                    alert('Pembayaran berhasil disimpan!');
                    location.reload(); 
                    btnBayar.replaceWith(`<button type="button" class="btn btn-info btn-buka" data-id="${id_paket}">Buka</button>`);

                    var invoiceHtml = `
                        <div class="invoice printable">
                            <div class="text-center mb-4">
                                <h2><strong>INVOICE</strong></h2>
                                <hr>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p><strong>Kepada:</strong> ${penyedia}</p>
                                    <p><strong>Paket:</strong> ${namaPaket}</p>
                                </div>
                                <div class="text-right">
                                    <p><strong>Tanggal:</strong> ${tanggal}</p>
                                    <p><strong>No Invoice:</strong> INV-${id_paket}</p>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-light">
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>PPN</td><td>Rp ${formatRupiah(ppn)}</td></tr>
                                    <tr><td>PPH</td><td>Rp ${formatRupiah(pph)}</td></tr>
                                    <tr><td><strong>Total Bayar</strong></td><td><strong>Rp ${formatRupiah(total)}</strong></td></tr>
                                </tbody>
                            </table>
                            <div class="mt-5 text-right">
                                <p>Hormat Kami,</p>
                                <br><br>
                                <p><strong>....................</strong><br>(Tanda Tangan)</p>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-cetak-invoice mt-3">Cetak Invoice</button>
                    `;
                    card.find('.card-body').html(invoiceHtml);
                } else {
                    alert('Gagal: ' + res.message);
                }
            });
        });

        // === TOMBOL BUKA ===
        $('#example tbody').on('click', '.btn-buka', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var id_paket = $(this).data('id');
            var namaPaket = tr.find('.nama-paket').text();
            var penyedia = tr.find('.nama-penyedia').text();
            var tanggal = tr.find('.tanggal').text();

            // Tutup semua accordion sebelum membuka baru
            table.rows().every(function() {
                if (this.child.isShown()) {
                    this.child.hide();
                    $(this.node()).removeClass('shown');
                }
            });

            // Kalau baris ini sudah terbuka, jangan buka lagi
            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
                return;
            }

            $.post('<?= site_url('Pembayaran/get_pembayaran') ?>', {
                id_paket: id_paket
            }, function(response) {
                var res = JSON.parse(response);
                if (res.success) {
                    var data = res.data;
                    var invoiceHtml = `
                        <div class="invoice printable">
                            <div class="text-center mb-4">
                                <h2><strong>INVOICE</strong></h2>
                                <hr>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p><strong>Kepada:</strong> ${penyedia}</p>
                                    <p><strong>Nama Paket Tender:</strong> ${namaPaket}</p>
                                </div>
                                <div class="text-right">
                                    <p><strong>Tanggal:</strong> ${tanggal}</p>
                                    <p><strong>No Invoice:</strong> INV-${id_paket}</p>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-light">
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>PPN</td><td>Rp ${formatRupiah(data.ppn)}</td></tr>
                                    <tr><td>PPH</td><td>Rp ${formatRupiah(data.pph)}</td></tr>
                                    <tr><td><strong>Total Bayar</strong></td><td><strong>Rp ${formatRupiah(data.total)}</strong></td></tr>
                                </tbody>
                            </table>
                            <div class="mt-5 text-right">
                                <p>Hormat Kami,</p>
                                <br><br>
                                <p><strong>....................</strong><br>(Tanda Tangan)</p>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-cetak-invoice mt-3">Cetak Invoice</button>
                    `;
                    row.child(invoiceHtml).show();
                    tr.addClass('shown');
                } else {
                    alert('Data pembayaran tidak ditemukan');
                }
            });
        });

        // === CETAK INVOICE ===
        $(document).on('click', '.btn-cetak-invoice', function() {
            window.print();
        });
    });
    </script>
</body>
</html>