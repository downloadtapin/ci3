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
        <h1 class="h3 mb-2 text-gray-800">BERITA ACARA NEGOSIASI</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor Negosiasi</th>
                                <th>Nama Tender</th>
                                <th>Tanggal</th>
                                <th>Pokja Pemilihan</th>
                                <th>Nama Penyedia</th>
                                <th>Nilai HPS</th>
                                <th>Nilai Penawaran</th>
                                <th>Nilai Terkoreksi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($negosiasis as $negosiasi): ?>
                            <tr>
                                <td class="no-klarifikasi">
                                    <?php 
                                                echo $negosiasi->No_Negosiasi;
                                        ?>
                                </td>
                                <td class="nama-paket">
                                    <?php 
                                        // Cari Id_kode_tender di tabel evaluasi menggunakan Id_evaluasi_penawaran dari tabel klarifikasi
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $negosiasi->Id_evaluasi_penawaran) {
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
                                <td class="kode-tender" hidden="true">
                                    <?php 
                                        // Cari Id_kode_tender di tabel evaluasi menggunakan Id_evaluasi_penawaran dari tabel klarifikasi
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $negosiasi->Id_evaluasi_penawaran) {
                                                // Dapatkan Id_kode_tender
                                                $Id_kode_tender = $evaluasi->Id_kode_tender;
                                                // Cari nama tender di tabel paket menggunakan Id_kode_tender
                                                foreach ($pakets as $paket) {
                                                    if ($paket->Id_kode_tender == $Id_kode_tender) {
                                                        echo $paket->kode_tender;
                                                        break;
                                                    }
                                                }
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="alamat" hidden="true">
                                    <?php 
                                        foreach ($pembuktians as $pembuktian) {
                                            if ($pembuktian->Id_evaluasi_penawaran == $negosiasi->Id_evaluasi_penawaran) {
                                                echo $pembuktian->Alamat;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>

                                <td class="tahun-anggaran" hidden="true">
                                    <?php 
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $negosiasi->Id_evaluasi_penawaran) {
                                                // Ekstrak tahun dari tanggal
                                                echo date('Y', strtotime($evaluasi->Tanggal));
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="harga-pembulatan" hidden="true">
                                    <?php 
                                        foreach ($negosiasis as $negosiasi) {
                                            if ($negosiasi->Id_negosiasi == $klarifikasi->Id_evaluasi_penawaran) {
                                                // Get the original price
                                                $harga_negosiasi = $negosiasi->harga_negosiasi;

                                                // Remove any non-numeric characters
                                                $numeric_value = preg_replace('/[^\d]/', '', $harga_negosiasi);

                                                // If the value is not long enough, pad with zeros on the left
                                                $numeric_value = str_pad($numeric_value, 7, '0', STR_PAD_LEFT);

                                                // Round the last five digits to '000'
                                                $rounded_value = substr($numeric_value, 0, -5) . '000';

                                                // Format the integer part with dots
                                                $formatted_value = number_format($rounded_value) ;

                                                // Append the fixed fractional part ',00'
                                                $formatted_value .= ',00';

                                                // Print the formatted value with 'Rp ' prefix
                                                echo 'Rp ' . $formatted_value;
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
                                            if ($evaluasi->Id_evaluasi_penawaran == $negosiasi->Id_evaluasi_penawaran) {
                                                echo $evaluasi->nama_Penyedia;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="hps">
                                    <?php 
                                        // Cari Id_kode_tender di tabel evaluasi menggunakan Id_evaluasi_penawaran dari tabel klarifikasi
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $negosiasi->Id_evaluasi_penawaran) {
                                                // Dapatkan Id_kode_tender
                                                $Id_kode_tender = $evaluasi->Id_kode_tender;
                                                // Cari nama tender di tabel paket menggunakan Id_kode_tender
                                                foreach ($pakets as $paket) {
                                                    if ($paket->Id_kode_tender == $Id_kode_tender) {
                                                        echo 'Rp ' . $paket->Nilai_HPS;
                                                        break;
                                                    }
                                                }
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="harga-penawaran">
                                    <?php 
                                        foreach ($negosiasis as $negosiasi) {
                                            if ($negosiasi->Id_negosiasi == $negosiasi->Id_evaluasi_penawaran) {
                                                echo 'Rp ' . $negosiasi->harga_penawaran ;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="harga-terkoreksi">
                                    <?php 
                                        foreach ($negosiasis as $negosiasi) {
                                            if ($negosiasi->Id_negosiasi == $negosiasi->Id_evaluasi_penawaran) {
                                                echo 'Rp ' . $negosiasi->harga_terkoreksi ;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="harga-negosiasi" hidden="true">
                                    <?php 
                                        foreach ($negosiasis as $negosiasi) {
                                            if ($negosiasi->Id_negosiasi == $negosiasi->Id_evaluasi_penawaran) {
                                                echo 'Rp ' . $negosiasi->harga_negosiasi ;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>


                                <td>
                                    <button class="btn btn-primary cetak-btn"
                                        data-id="<?= $negosiasi->Id_negosiasi ?>">
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
                                        <table width="100%" style="line-height: 1.2em">
                                            <tr>
                                                <td colspan="2"
                                                    style="text-align: center; font-weight: bold;font-size: 20px; text-transform: uppercase">
                                                    BERITA ACARA
                                                    <br> Negosiasi Teknis dan Harga/Biaya
                                                    <br> <span class="nama-paket"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center; font-size: 17px">
                                                    Nomor : <span class="no-klarifikasi"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: justify; line-height: 1em">
                                        Pada hari ini tanggal <span class="tanggal"></span>, telah dibuat Berita Acara
                                        Negosiasi
                                        Teknis dan Harga/Biaya bertempat di Ruang rapat UKPBJ Kab. Tapin, Jl. Brigjen H.
                                        Hasan basri km. 1,5 Komplek islamic center Rantau, terhadap <span
                                            class="nama-penyedia"></span>
                                        untuk paket pekerjaan :
                                    </td>
                                </tr>

                                <tr>
                                    <td>&nbsp; </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <table colspan="2" style="width: 100%">
                                            <tr>
                                                <td>
                                                    Kode Tender
                                                </td>
                                                <td>:</td>
                                                <td class="kode-tender">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nama Tender
                                                </td>
                                                <td>:</td>
                                                <td class="nama-paket"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>1. Hasil dari Negosiasi Teknis sebagai berikut:</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Tidak ada negosiasi teknis
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>2. Hasil Negosiasi Biaya sebagai berikut:</b>
                                                    <b><span class="nama-penyedia"></span></b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Nilai Total HPS
                                                </td>
                                                <td>:</td>
                                                <td class="hps"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Nilai Penawaran
                                                </td>
                                                <td>:</td>
                                                <td class="harga-penawaran"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Nilai Penawaran Terkoreksi
                                                </td>
                                                <td>:</td>
                                                <td class="harga-terkoreksi"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Nilai Negosiasi Biaya
                                                </td>
                                                <td>:</td>
                                                <td class="harga-negosiasi"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td style="width: 400px"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: justify; line-height: 1em">
                                        Demikian Berita Acara ini dibuat dan ditandatangani pada Hari, Tanggal dan Bulan
                                        sebagaimana tersebut di atas untuk dipergunakan sebagaimana mestinya.
                                    </td>
                                </tr>


                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
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
        clone.find('.harga-pembulatan').text(row.find('.harga-pembulatan').text());
        clone.find('.keterangan-lain').text(row.find('.keterangan-lain').text());
        clone.find('.pokja-pemilihan').text(row.find('.pokja-pemilihan').text());
        clone.find('.kode-tender').text(row.find('.kode-tender').text());
        clone.find('.harga-penawaran').text(row.find('.harga-penawaran').text());


        $('#halamancetak').html(clone.html());
        printContent();
    });
    </script>
</body>

</html>