<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Preview</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @page {
        size: A4;
        margin: 20mm;
    }

    @media print {

        body,
        html {
            width: 210mm;
            height: 297mm;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .printable {
            page-break-inside: avoid;
            width: 100%;
            height: auto;
        }
    }

    .container {
        margin: 20mm;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">BERITA ACARA EVALUASI</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Tender</th>
                                <th>Nama Tender</th>
                                <th>Nomor Evaluasi</th>
                                <th>Tanggal</th>
                                <th>Metode Pemilihan</th>
                                <th>Metode Evaluasi</th>
                                <th>Pokja Pemilihan</th>
                                <th>Nama Penyedia</th>
                                <th>Nilai Penawaran</th>
                                <th>Kualifikasi</th>
                                <th>Administrasi</th>
                                <th>Teknis</th>
                                <th>Harga</th>
                                <th>Keterangan Lain</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evaluasis as $evaluasi): ?>
                            <tr>
                                <td class="kode-tender"><?= $evaluasi->Tanggal ?></td>
                                <td class="nama-paket">
                                    <?php 
                                    foreach ($pakets as $paket) {
                                        if ($paket->Id_kode_tender == $evaluasi->Id_kode_tender) {
                                            echo $paket->Nama_tender;
                                            break;
                                        }
                                    }
                                    ?>
                                </td>
                                <td class="no-evaluasi"><?= $evaluasi->No_Evaluasi ?></td>
                                <td class="tanggal"><?= $evaluasi->Tanggal ?></td>
                                <td class="metode-tender"><?= $evaluasi->Metode_evaluasi ?></td>
                                <td class="metode-evaluasi"><?= $evaluasi->Metode_evaluasi ?></td>
                                <td class="hps" hidden="true">
                                    <?php 
                                        foreach ($pakets as $paket) {
                                            if ($paket->Id_kode_tender == $evaluasi->Id_kode_tender) {
                                                // Format Nilai HPS menjadi format mata uang Rupiah
                                                echo 'Rp ' . number_format($paket->Nilai_HPS, 0, ',', '.');
                                                break;
                                            }
                                        }
                                    ?>
                                </td>
                                <td class="pokja-pemilihan">
                                    <?php 
                                        foreach ($pakets as $paket) {
                                            if ($paket->Id_kode_tender == $evaluasi->Id_kode_tender) {
                                                echo $paket->Pokja_pemilihan;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="nama-penyedia"><?= $evaluasi->nama_Penyedia ?></td>
                                <td class="nilai-penawaran"><?= $evaluasi->nilai_penawaran ?></td>
                                <td class="kualifikasi" style="font-weight: bold">
                                    <?= ($evaluasi->kualifikasi == 1) ? 'v' : 'x' ?>
                                </td>
                                <td class="administrasi" style="font-weight: bold">
                                    <?= ($evaluasi->administrasi == 1) ? 'v' : 'x' ?>
                                </td>
                                <td class="teknis" style="font-weight: bold">
                                    <?= ($evaluasi->teknis == 1) ? 'v' : 'x' ?>
                                </td>
                                <td class="harga" style="font-weight: bold">
                                    <?= ($evaluasi->harga == 1) ? 'v' : 'x' ?>
                                </td>
                                <td class="keterangan-lain"><?= $evaluasi->Keterangan_lain ?></td>
                                <td>
                                    <button class="btn btn-primary cetak-btn"
                                        data-id="<?= $evaluasi->Id_evaluasi_penawaran ?>">
                                        <i class="bi bi-printer"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Printable Section -->
    <div id="halamancetak" style="display: none; margin:auto">
        <div class="review-section mt-3 ukuran2">

            <div id="component1" class="printable"
                style="background: white; padding: 1em 0em 0em 0em;width: 24cm; height: 29cm; margin :auto">
                <table style="font-family:Bookman Old Style, serif;color:black;">
                    <tr>
                        <td>
                            <table>
                                <tr style="border-bottom: 1px solid black">
                                    <td colspan="2">
                                        <table width="100%" style="text-align: center;line-height:1.3em">
                                            <tr>
                                                <td rowspan="7">
                                                    <img style="max-width: 120px; max-height: 120px;"
                                                        src="<?php echo base_url('assets/img/tapin.png'); ?>"
                                                        alt="Deskripsi Gambar" />
                                                </td>
                                            </tr>
                                            <tr style="font-size:   27px;">
                                                <td>
                                                    PEMERINTAH KABUPATEN TAPIN
                                                </td>
                                            </tr>
                                            <tr style="font-size:   27px;">
                                                <td>
                                                    SEKRETARIAT DAERAH
                                                </td>
                                            </tr>
                                            <tr style="font-weight: bold;font-size:   27px; ">
                                                <td>
                                                    UNIT KERJA PENGADAAN BARANG/JASA
                                                </td>
                                            </tr>
                                            <tr style="font-size:   27px;">
                                                <td style="text-transform: uppercase;">
                                                    <span class="pokja-pemilihan"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 18px;">
                                                    Jalan Brigjend H. Hasan Basry, Komp. Islamic Center No. 22 Telp.
                                                    (0517) 31961-31966
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold">
                                                    Rantau - Kode Pos 71111
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-transform: underline">&nbsp; </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%" style="">
                                            <tr>
                                                <td colspan="2"
                                                    style="text-align: center; font-weight: bold;font-size: 22px; text-decoration: underline">
                                                    BERITA ACARA EVALUASI PENAWARAN							

                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center; font-size: 17px">
                                                    Nomor : <span class="no-evaluasi"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 17px; text-align : justify">
                                                    kami <span class="pokja-pemilihan"></span> Unit Kerja Pengadaan
                                                    Barang/Jasa Kabupaten
                                                    Tapin melaksanakan Penjelasan:
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" font-size: 17px">
                                        <table>
                                            <tr>
                                                <td style="width: 200px">
                                                    Tanggal
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="tanggal">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Kode Tender
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="kode-tender">

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    Nama Paket
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="nama-paket">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    HPS
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="hps">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Metode Pemilihan
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="metode-tender">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Metode Evaluasi
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="metode-evaluasi">

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td style=" font-size: 17px; vertical-align: top">
                                        <table style=" font-size: 17px; width:100%; text-align: center " border>
                                            <tr>
                                                <td>
                                                    Nama Penyedia
                                                </td>
                                                <td>
                                                    Nilai Penawaran
                                                </td>
                                                <td>
                                                    kualifikasi
                                                </td>
                                                <td>
                                                    Administrasi
                                                </td>
                                                <td>
                                                    Teknis
                                                </td>
                                                <td>
                                                    Harga
                                                </td>
                                                <td>
                                                    Keterangan Lain
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="nama-penyedia" style="height: 200px">

                                                </td>
                                                <td class="nilai-penawaran">

                                                </td>
                                                <td class="kualifikasi">

                                                </td>
                                                <td class="administrasi">

                                                </td>
                                                <td class="teknis">

                                                </td>
                                                <td class="harga">

                                                </td>
                                                <td class="keterangan-lain">

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td style=" font-size: 17px; text-align : justify">
                                        Demikian Berita Acara ini dibuat untuk dapat dipergunakan sebagaimana mestinv.
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="text-align: center; font-size: 17px; width:100%; font-weight: bold">
                                            <tr>
                                                <td>
                                                    UKPBJ Kabupaten Tapin
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    ttd
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="pokja-pemilihan"></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    function printContent() {
        var printArea = document.getElementById('halamancetak').innerHTML;
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printArea;
        window.print();
        document.body.innerHTML = originalContent;
    }

    $(document).on('click', '.cetak-btn', function() {
        var row = $(this).closest('tr');
        var clone = $('#halamancetak').clone();
        clone.find('.kode-tender').text(row.find('.kode-tender').text());
        clone.find('.nama-paket').text(row.find('.nama-paket').text());
        clone.find('.hps').text(row.find('.hps').text());
        clone.find('.metode-tender').text(row.find('.metode-tender').text());
        clone.find('.metode-evaluasi').text(row.find('.metode-evaluasi').text());
        clone.find('.no-evaluasi').text(row.find('.no-evaluasi').text());
        clone.find('.tanggal').text(row.find('.tanggal').text());
        clone.find('.nama-penyedia').text(row.find('.nama-penyedia').text());
        clone.find('.tahun-anggaran').text(row.find('.tahun-anggaran').text());
        clone.find('.nilai-penawaran').text(row.find('.nilai-penawaran').text());
        clone.find('.kualifikasi').text(row.find('.kualifikasi').text());
        clone.find('.administrasi').text(row.find('.administrasi').text());
        clone.find('.teknis').text(row.find('.teknis').text());
        clone.find('.harga').text(row.find('.harga').text());
        clone.find('.keterangan-lain').text(row.find('.keterangan-lain').text());
        clone.find('.pokja-pemilihan').text(row.find('.pokja-pemilihan').text());
        

        $('#halamancetak').html(clone.html());
        printContent();
    });
    </script>
</body>

</html>