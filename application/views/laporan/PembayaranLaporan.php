<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
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
                            <?php foreach ($pemilihans as $index => $pemilihan): ?>
                            <tr>
                                <td class="no-pemilihan"><?= $pemilihan->No_Pemilihan ?></td>
                                <td class="nilai-kontrak">
                                    <?php 
                                        foreach ($negosiasis as $negosiasi) {
                                            if ($negosiasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                $harga_negosiasi = $negosiasi->harga_negosiasi;
                                                $numeric_value = preg_replace('/[^\d]/', '', $harga_negosiasi);
                                                $numeric_value = str_pad($numeric_value, 7, '0', STR_PAD_LEFT);
                                                $rounded_value = substr($numeric_value, 0, -5) . '000';
                                                $formatted_value = number_format($rounded_value);
                                                $formatted_value .= ',00';
                                                echo 'Rp ' . $formatted_value;
                                                break;
                                            }
                                        }
                                    ?>
                                </td>
                                <td class="nama-paket">
                                    <?php 
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                $Id_kode_tender = $evaluasi->Id_kode_tender;
                                                foreach ($pakets as $paket) {
                                                    if ($paket->Id_kode_tender == $Id_kode_tender) {
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
                                                $Id_kode_tender = $evaluasi->Id_kode_tender;
                                                foreach ($pakets as $paket) {
                                                    if ($paket->Id_kode_tender == $Id_kode_tender) {
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
                                        'id_paket' => $paket->Id_kode_tender,
                                        'status' => true
                                    ])->row();
                                    ?>
                                    <?php if ($sudah_bayar): ?>
                                        <button type="button"
                                            class="btn btn-primary btn-cetak-invoice"
                                            data-id="<?= $paket->Id_kode_tender ?>"
                                        >Cetak Invoice</button>
                                    <?php else: ?>
                                        <button type="button"
                                            class="btn btn-success btn-bayar"
                                            data-id="<?= $paket->Id_kode_tender ?>"
                                        >Bayar</button>
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
    $(document).ready(function() {
        var table = $('#example').DataTable();

        // Tombol Bayar → buka form
        $('#example tbody').on('click', '.btn-bayar', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
            } else {
                table.rows().every(function() {
                    if (this.child.isShown()) {
                        this.child.hide();
                        $(this.node()).removeClass('shown');
                    }
                });

                var namaPaket = tr.find('.nama-paket').text();
                var nilaiKontrak = tr.find('.nilai-kontrak').text();
                var kontrak = parseInt(nilaiKontrak.replace(/[^0-9]/g, '')) || 0;

                var childHtml = `
                    <div class="card mt-2" data-id="${$(this).data('id')}">
                        <div class="card-body">
                            <h5>Pembayaran</h5>
                            <form class="form-pembayaran">
                                <input type="hidden" class="inputIdPaket" value="${$(this).data('id')}">
                                <div class="form-group">
                                    <label>Nama Paket</label>
                                    <input type="text" class="form-control inputNamaPaket" value="${namaPaket}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nilai Kontrak</label>
                                    <input type="text" class="form-control nilai-kontrak" value="${nilaiKontrak}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pajak PPN</label>
                                    <input type="number" class="form-control ppn" value="0">
                                </div>
                                <div class="form-group">
                                    <label>Pajak PPH</label>
                                    <input type="number" class="form-control pph" value="0">
                                </div>
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" class="form-control total" value="Rp ${kontrak.toLocaleString('id-ID')}" readonly>
                                </div>
                                <button type="button" class="btn btn-success btn-bayar-accordion">Proses Bayar</button>
                                <button type="button" class="btn btn-secondary btn-batal-accordion">Batal</button>
                            </form>
                        </div>
                    </div>
                `;
                row.child(childHtml).show();
                tr.addClass('shown');
            }
        });

        // Update total saat pajak diinput
        $(document).on('input', '.ppn, .pph', function () {
            var form = $(this).closest('form');
            var nilaiKontrak = form.find('.nilai-kontrak').val();
            var kontrak = parseInt(nilaiKontrak.replace(/[^0-9]/g, '')) || 0;
            var ppn = parseInt(form.find('.ppn').val()) || 0;
            var pph = parseInt(form.find('.pph').val()) || 0;
            var total = kontrak - ppn - pph;
            form.find('.total').val('Rp ' + total.toLocaleString('id-ID'));
        });

        // Tombol Proses Bayar
        $(document).on('click', '.btn-bayar-accordion', function() {
            var card = $(this).closest('.card');
            var form = card.find('form');

            var id_paket = form.find('.inputIdPaket').val() || "";
            var nama_paket = form.find('.inputNamaPaket').val() || "-";
            var ppn = form.find('.ppn').val() || 0;
            var pph = form.find('.pph').val() || 0;
            var total = form.find('.total').val().replace(/[^0-9]/g, '') || 0;

            var tr = card.closest('tr').prev();
            var btnBayar = tr.find('.btn-bayar');

            $.post('<?= site_url('Pembayaran/proses_bayar') ?>', {
                id_paket: id_paket,
                ppn: ppn,
                pph: pph,
                total: total
            }, function(response) {
                var res = JSON.parse(response);
                var $notif = $('#notifPembayaran');
                if (res.success) {
                    btnBayar.replaceWith(`
                        <button type="button"
                            class="btn btn-primary btn-cetak-invoice"
                            data-id="${id_paket}"
                        >Cetak Invoice</button>
                    `);

                    $notif.removeClass('alert-danger').addClass('alert-success')
                        .text('Pembayaran berhasil! Invoice akan dibuat.').fadeIn();
                    setTimeout(function(){ $notif.fadeOut(); }, 3000);

                    var invoiceHtml = `
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="invoice-content">
                                    <h3 class="mb-4 text-center">Invoice Pembayaran</h3>
                                    <table class="table">
                                        <tr><th>Nama Paket</th><td>${nama_paket}</td></tr>
                                        <tr><th>PPN</th><td>Rp ${parseInt(ppn).toLocaleString('id-ID')}</td></tr>
                                        <tr><th>PPH</th><td>Rp ${parseInt(pph).toLocaleString('id-ID')}</td></tr>
                                        <tr><th>Total Bayar</th><td>Rp ${parseInt(total).toLocaleString('id-ID')}</td></tr>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-primary btn-cetak-invoice">Cetak Invoice</button>
                            </div>
                        </div>
                    `;
                    var row = table.row(tr);
                    row.child(invoiceHtml).show();
                    tr.addClass('shown');
                } else {
                    $notif.removeClass('alert-success').addClass('alert-danger')
                        .text('Gagal: ' + res.message).fadeIn();
                    setTimeout(function(){ $notif.fadeOut(); }, 3000);
                }
            });
        });

        // Tombol Batal
        $(document).on('click', '.btn-batal-accordion', function () {
            table.rows().every(function() {
                this.child.hide();
                $(this.node()).removeClass('shown');
            });
        });

        // Tombol Cetak Invoice → hanya cetak invoice-content
        $(document).on('click', '.btn-cetak-invoice', function() {
            var invoiceContent = $(this).closest('.card-body').find('.invoice-content').html();
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = `
                <div style="max-width:600px;margin:auto;">
                    ${invoiceContent}
                </div>
            `;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        });
    });
    </script>
</body>
</html>
