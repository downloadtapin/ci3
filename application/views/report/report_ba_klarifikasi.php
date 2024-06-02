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
        <h1 class="h3 mb-2 text-gray-800">BERITA ACARA KLARIFIKASI</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor Klarifikasi</th>
                                <th>Nama Tender</th>
                                <th>Nomor Evaluasi</th>
                                <th>Tanggal</th>
                                <th>Pokja Pemilihan</th>
                                <th>Nama Penyedia</th>
                                <th>Harga Terkoreksi</th>
                                <th>Harga Negosiasi Pembulatan</th>
                                <th>Ket</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($klarifikasis as $klarifikasi): ?>
                            <tr>
                                <td class="no-klarifikasi"><?= $klarifikasi->No_Klarifikasi ?></td>
                                <td class="nama-paket">
                                    <?php 
                                        // Cari Id_kode_tender di tabel evaluasi menggunakan Id_evaluasi_penawaran dari tabel klarifikasi
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $klarifikasi->Id_evaluasi_penawaran) {
                                                // Dapatkan Id_kode_tender
                                                $Id_kode_tender = $evaluasi->Id_kode_tender;
                                                // Cari nama tender di tabel paket menggunakan Id_kode_tender
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
                                <td class="no-evaluasi">
                                    <?php 
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $klarifikasi->Id_evaluasi_penawaran) {
                                                echo $evaluasi->No_Evaluasi;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="tanggal"><?= $evaluasi->Tanggal ?></td>
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
                                <td class="nama-penyedia">
                                    <?php 
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $klarifikasi->Id_evaluasi_penawaran) {
                                                echo $evaluasi->nama_Penyedia;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="harga-terkoreksi">
                                    <?php 
                                        foreach ($negosiasis as $negosiasi) {
                                            if ($negosiasi->Id_negosiasi == $klarifikasi->Id_evaluasi_penawaran) {
                                                echo 'Rp ' . number_format($negosiasi->harga_penawaran, 0, ',', '.');
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="harga-negosiasi">
                                    <?php 
                                        foreach ($negosiasis as $negosiasi) {
                                            if ($negosiasi->Id_negosiasi == $klarifikasi->Id_evaluasi_penawaran) {
                                                echo 'Rp ' . number_format($negosiasi->harga_penawaran, 0, ',', '.');
                                                break;
                                            }
                                        }
                                        ?>
                                </td>

                                <td class="ket"><?= $klarifikasi->Keterangan_lain ?></td>
                                <td>
                                    <button class="btn btn-primary cetak-btn"
                                        data-id="<?= $klarifikasi->Id_klarifikasi ?>">
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
                                                    BERITA ACARA PEMBERIAN PENJELASAN

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
                                        <table
                                            style="text-align: center; font-size: 17px; width:100%; font-weight: bold">
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
        clone.find('.no-klarifikasi').text(row.find('.no-klarifikasi').text());
        clone.find('.nama-paket').text(row.find('.nama-paket').text());
        clone.find('.hps').text(row.find('.hps').text());
        clone.find('.no-evaluasi').text(row.find('.no-evaluasi').text());
        clone.find('.tanggal').text(row.find('.tanggal').text());
        clone.find('.nama-penyedia').text(row.find('.nama-penyedia').text());
        clone.find('.harga-terkoreksi').text(row.find('.harga-terkoreksi').text());
        clone.find('.harga-negosiasi').text(row.find('.harga-negosiasi').text());
        clone.find('.keterangan-lain').text(row.find('.keterangan-lain').text());
        clone.find('.pokja-pemilihan').text(row.find('.pokja-pemilihan').text());


        $('#halamancetak').html(clone.html());
        printContent();
    });
    </script>
</body>

</html>