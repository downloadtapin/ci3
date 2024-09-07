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
        <h1 class="h3 mb-2 text-gray-800">BERITA ACARA PENJELASAN</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Tender</th>
                                <th>Nilai HPS</th>
                                <th>Metode Tender</th>
                                <th>Metode Evaluasi</th>
                                <th>Pokja Pemilihan</th>
                                <th>No. Penjelasan</th>
                                <th>Tanggal</th>
                                <th>Nama Penyedia</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Keterangan Lain</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($penjelasans as $penjelasan): ?>
                            <tr>
                                <td class="nama-paket">
                                    <?php 
                        foreach ($pakets as $paket) {
                            if ($paket->Id_kode_tender == $penjelasan->Id_kode_tender) {
                                echo $paket->Nama_tender;
                                break;
                            }
                        }
                        ?>
                                </td>

                                <td class="kode-tender" hidden="true">
                                    <?php 
                        foreach ($pakets as $paket) {
                            if ($paket->Id_kode_tender == $penjelasan->Id_kode_tender) {
                                echo $paket->kode_tender;
                                break;
                            }
                        }
                        ?>
                                </td>
                                <td class="hps">
                                    <?php 
                                        foreach ($pakets as $paket) {
                                            if ($paket->Id_kode_tender == $penjelasan->Id_kode_tender) {
                                                // Format Nilai HPS menjadi format mata uang Rupiah
                                                echo 'Rp ' . $paket->Nilai_HPS;
                                                break;
                                            }
                                        }
                                    ?>
                                </td>
                                <td class="metode-tender">
                                    <?php 
                        foreach ($pakets as $paket) {
                            if ($paket->Id_kode_tender == $penjelasan->Id_kode_tender) {
                                echo $paket->Metode_tender;
                                break;
                            }
                        }
                        ?>
                                </td>
                                <td class="metode-evaluasi">
                                    <?php 
                        foreach ($evaluasis as $evaluasi) {
                            if ($evaluasi->Id_kode_tender == $penjelasan->Id_kode_tender) {
                                echo $evaluasi->Metode_evaluasi;
                                break;
                            }
                        }
                        ?>
                                </td>
                                <td class="pokja-pemilihan">
                                    <?php 
                        foreach ($pakets as $paket) {
                            if ($paket->Id_kode_tender == $penjelasan->Id_kode_tender) {
                                echo $paket->Pokja_pemilihan;
                                break;
                            }
                        }
                        ?>
                                </td>
                                <td class="no-penjelasan"><?= $penjelasan->No_Penjelasan ?></td>
                                <td class="tanggal"><?= date('d-m-Y', strtotime($penjelasan->Tanggal)) ?></td>
                                <td class="nama-penyedia"><?= $penjelasan->Nama_penyedia ?></td>
                                <td style="vertical-align: top" class="pertanyaan">
                                    <?php 
                                            // Memisahkan pertanyaan menjadi array berdasarkan spasi
                                            $pertanyaan_array = explode(";", $penjelasan->Pertanyaan);
                                            
                                            // Menampilkan setiap pertanyaan dalam baris tersendiri
                                            foreach ($pertanyaan_array as $pertanyaan) {
                                                echo "<br>$pertanyaan";
                                            }
                                            ?>
                                </td>
                                <td class="jawaban"><?= $penjelasan->Jawaban ?></td>
                                <td class="keterangan-lain"><?= $penjelasan->Keterangan_lain ?></td>
                                <td>
                                    <button class="btn btn-primary cetak-btn"
                                        data-id="<?= $penjelasan->Id_penjelasan ?>">
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
                                                    Pokja Pemilihan <span class="pokja-pemilihan"></span>
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
                                        <table width="100%" style="line-height:1.2em">
                                            <tr>
                                                <td colspan="2"
                                                    style="text-align: center; font-weight: bold;font-size: 22px; text-decoration: underline">
                                                    BERITA ACARA PEMBERIAN PENJELASAN

                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center; font-size: 17px">
                                                    Nomor : <span class="no-penjelasan"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 17px; text-align : justify">
                                                    kami Pokja Pemilihan <span class="pokja-pemilihan"></span> Unit Kerja Pengadaan
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
                                        <table style=" font-size: 17px">
                                            <tr>
                                                <td style="vertical-align: top; width: 200px">
                                                    A. Daftar Pertanyaan
                                                </td>
                                                <td style="vertical-align: top">
                                                    :
                                                </td>
                                                <td style="vertical-align: top">
                                                    <span class="pertanyaan"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30px">
                                                    B. Daftar Jawaban
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td style="vertical-align: top" class="jawaban">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    C. Keterangan Lain
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td style="vertical-align: top" class="keterangan-lain">

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
                                        Demikian Berita Acara ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
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
                                        <table style="text-align: center; font-size: 17px; width:100%">
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
                                                <td >
                                                Pokja Pemilihan <span class="pokja-pemilihan"></span>
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
        clone.find('.no-penjelasan').text(row.find('.no-penjelasan').text());
        clone.find('.tanggal').text(row.find('.tanggal').text());
        clone.find('.nama-penyedia').text(row.find('.nama-penyedia').text());
        clone.find('.pertanyaan').text(row.find('.pertanyaan').text());
        clone.find('.jawaban').text(row.find('.jawaban').text());
        clone.find('.keterangan-lain').text(row.find('.keterangan-lain').text());
        clone.find('.pokja-pemilihan').text(row.find('.pokja-pemilihan').text());

        $('#halamancetak').html(clone.html());
        printContent();
    });
    </script>
</body>

</html>