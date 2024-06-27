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
        <h1 class="h3 mb-2 text-gray-800">PENETAPAN PEMENANG</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No Pemilihan</th>
                                <th>No Penetapan</th>
                                <th>Nama Tender</th>
                                <th>Pokja Pemilihan</th>
                                <th>Tanggal</th>
                                <th>Nama Penyedia</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            function format_currency($amount) {
                                $rounded_amount = floor($amount / 1000) * 1000; // Round down to nearest thousand
                                return 'Rp. ' . number_format($rounded_amount, 2, ',', '.');
                            }
                            foreach ($pemilihans as $pemilihan): ?>
                            <tr>
                                <td class="no-pemilihan"><?= $pemilihan->No_Pemilihan ?></td>
                                <td class="no-penetapan"><?= $pemilihan->no_penetapan ?></td>


                                <td class="nama-paket">
                                    <?php 
                                        // Cari Id_kode_tender di tabel evaluasi menggunakan Id_evaluasi_penawaran dari tabel klarifikasi
                                        
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
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
                                <td class="tahun-anggaran" hidden="true">
                                    <?php 
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                // Ekstrak tahun dari tanggal
                                                echo date('Y', strtotime($evaluasi->Tanggal));
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="harga-terkoreksi" hidden="true">
                                    <?php 
                                        foreach ($negosiasis as $negosiasi) {
                                            if ($negosiasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                // Ekstrak tahun dari tanggal
                                                echo 'Rp '. $negosiasi->harga_terkoreksi;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="harga-negosiasi" hidden="true">
                                    <?php 
                                        foreach ($negosiasis as $negosiasi) {
                                            if ($negosiasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                // Ekstrak tahun dari tanggal
                                                echo 'Rp ' . $negosiasi->harga_negosiasi;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="harga-pembulatan" hidden="true">
                                    <?php 
                                        foreach ($negosiasis as $negosiasi) {
                                            if ($negosiasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                // Get the original price
                                                $harga_negosiasi = $negosiasi->harga_negosiasi;

                                                // Remove any non-numeric characters
                                                $numeric_value = preg_replace('/[^\d]/', '', $harga_negosiasi);

                                                // If the value is not long enough, pad with zeros on the left
                                                $numeric_value = str_pad($numeric_value, 7, '0', STR_PAD_LEFT);

                                                // Round the last five digits to '000'
                                                $rounded_value = substr($numeric_value, 0, -5) . '000';

                                                // Format the integer part with dots
                                                $formatted_value = number_format($rounded_value, 0, ',', '.');

                                                // Append the fixed fractional part ',00'
                                                $formatted_value .= ',00';

                                                // Print the formatted value with 'Rp ' prefix
                                                echo 'Rp ' . $formatted_value;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>

                                <td class="kode-tender" hidden="true">
                                    <?php 
                                        // Cari Id_kode_tender di tabel evaluasi menggunakan Id_evaluasi_penawaran dari tabel klarifikasi
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
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


                                <td class="pokja-pemilihan">
                                    <?php 
                                        // Cari Id_kode_tender di tabel evaluasi menggunakan Id_evaluasi_penawaran dari tabel klarifikasi
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                // Dapatkan Id_kode_tender
                                                $Id_kode_tender = $evaluasi->Id_kode_tender;
                                                // Cari nama tender di tabel paket menggunakan Id_kode_tender
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
                                <td class="hps" hidden="true">
                                    <?php 
                                        // Cari Id_kode_tender di tabel evaluasi menggunakan Id_evaluasi_penawaran dari tabel klarifikasi
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                // Dapatkan Id_kode_tender
                                                $Id_kode_tender = $evaluasi->Id_kode_tender;
                                                // Cari nama tender di tabel paket menggunakan Id_kode_tender
                                                foreach ($pakets as $paket) {
                                                    if ($paket->Id_kode_tender == $Id_kode_tender) {
                                                        echo 'Rp ' . number_format($paket->Nilai_HPS, 0, ',', '.');
                                                        break;
                                                    }
                                                }
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="pagu" hidden="true">
                                    <?php 
                                        // Cari Id_kode_tender di tabel evaluasi menggunakan Id_evaluasi_penawaran dari tabel klarifikasi
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                // Dapatkan Id_kode_tender
                                                $Id_kode_tender = $evaluasi->Id_kode_tender;
                                                // Cari nama tender di tabel paket menggunakan Id_kode_tender
                                                foreach ($pakets as $paket) {
                                                    if ($paket->Id_kode_tender == $Id_kode_tender) {
                                                        echo 'Rp ' . number_format($paket->Nilai_Pagu, 0, ',', '.');
                                                        break;
                                                    }
                                                }
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="unit-kerja" hidden="true">
                                    <?php 
                                        // Cari Id_kode_tender di tabel evaluasi menggunakan Id_evaluasi_penawaran dari tabel klarifikasi
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                // Dapatkan Id_kode_tender
                                                $Id_kode_tender = $evaluasi->Id_kode_tender;
                                                // Cari nama tender di tabel paket menggunakan Id_kode_tender
                                                foreach ($pakets as $paket) {
                                                    if ($paket->Id_kode_tender == $Id_kode_tender) {
                                                        echo $paket->Unit_kerja;
                                                        break;
                                                    }
                                                }
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
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
                                <td class="nama-hadir" hidden="true">
                                    <?php 
                                        foreach ($pembuktians as $pembuktian) {
                                            if ($pembuktian->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                echo $pembuktian->Nama_hadir;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="alamat" hidden="true">
                                    <?php 
                                        foreach ($pembuktians as $pembuktian) {
                                            if ($pembuktian->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                                echo $pembuktian->Alamat;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>


                                <td>
                                    <button class="btn btn-primary cetak-btn" data-id="<?= $pemilihan->Id_pemilihan ?>">
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
                                                    style="text-align: center; font-weight: bold;font-size: 20px; text-decoration: underline ">
                                                    PENETAPAN PEMENANG
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center; font-size: 17px">
                                                    Nomor : <span class="no-penetapan"></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 17px;text-align: justify">
                                        Berdasarkan hasil evaluasi penawaran
                                        dan evaluasi kualifikasi pada Dokumen Penawaran dan Dokumen Kualifikasi dalam
                                        e-Tender Pascakualifikasi, Satu File, Harga Terendah yang dilaksanakan oleh
                                        <span class="pokja-pemilihan"></span> Bagian Pengadaan Barang/Jasa Pemerintah
                                        Kabupaten Tapin Tahun Anggaran <span class="tahun-anggaran"></span> untuk <span
                                            class="nama-paket"></span>, maka ditetapkan Pemenang pada
                                        e-Tender Pascakualifikasi, Satu File, Harga Terendah adalah sebagai berikut :

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    1. Pagu Anggaran
                                                </td>
                                                <td>:</td>
                                                <td class="pagu"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. H P S
                                                </td>
                                                <td>:</td>
                                                <td class="hps"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Tanggal
                                                </td>
                                                <td>:</td>
                                                <td class="tanggal"></td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pemenang e-Tender Pascakualifikasi, Satu File, Harga
                                        Terendah berdasarkan
                                        urutannya :
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style=" font-size: 17px">
                                        <table style=" width: 100%">
                                            <tr style="text-align: center;">
                                                <td rowspan="2" style="border : 1px solid black">Peringkat</td>
                                                <td rowspan="2" colspan="4" style="border : 1px solid black">Data
                                                    Perusahaan</td>
                                                <td colspan="6" style="border : 1px solid black">Evaluasi</td>
                                            </tr>
                                            <tr style="text-align: center;">
                                                <td style="border : 1px solid black">&nbsp;Administrasi&nbsp;</td>
                                                <td style="border : 1px solid black">&nbsp;Teknis&nbsp;</td>
                                                <td style="border : 1px solid black">&nbsp;Harga&nbsp;</td>
                                                <td style="border : 1px solid black">&nbsp;Kualifikasi&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td rowspan="6" style="text-align: center;border : 1px solid black">
                                                    &nbsp;Pemenang&nbsp;
                                                </td>
                                                <td></td>
                                                <td style="vertical-align: top">Nama Perusahaan</td>
                                                <td style="vertical-align: top">:</td>
                                                <td style="vertical-align: top"><span class="nama-penyedia"></span></td>
                                                <td rowspan="6" style="text-align: center;border : 1px solid black">
                                                    Lulus</td>
                                                <td rowspan="6" style="text-align: center;border : 1px solid black">
                                                    Lulus</td>
                                                <td rowspan="6" style="text-align: center;border : 1px solid black">
                                                    Lulus</td>
                                                <td rowspan="6" style="text-align: center;border : 1px solid black">
                                                    Lulus</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="vertical-align: top">Direktur</td>
                                                <td style="vertical-align: top">:</td>
                                                <td style="vertical-align: top"><span class="nama-hadir"></span></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="vertical-align: top">Alamat</td>
                                                <td style="vertical-align: top">:</td>
                                                <td style="vertical-align: top"><span class="alamat"></span></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="vertical-align: top">Harga Penawaran Terkoreksi</td>
                                                <td style="vertical-align: top">:</td>
                                                <td style="vertical-align: top"><span class="harga-terkoreksi"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="vertical-align: top">Harga Negosiasi</td>
                                                <td style="vertical-align: top">:</td>
                                                <td style="vertical-align: top"><span class="harga-negosiasi"></span>
                                                </td>
                                            </tr>
                                            <tr style="border-bottom : 1px solid black">
                                                <td></td>
                                                <td style="vertical-align: top">Pembulatan</td>
                                                <td style="vertical-align: top">:</td>
                                                <td style="vertical-align: top"><span class="harga-pembulatan"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp; </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: justify; line-height: 1em">
                            Demikian Penetapan ini dibuat agar dapat dijadikan bahan dan dipergunakan sebagaimana
                            mestinya.
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
                        <td colspan="2">
                            <table style="text-align: center; font-size: 17px; font-weight: bold; margin-left: 600px">
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
        clone.find('.no-pembuktian').text(row.find('.no-pembuktian').text());
        clone.find('.no-penetapan').text(row.find('.no-penetapan').text());
        clone.find('.nama-paket').text(row.find('.nama-paket').text());
        clone.find('.kode-tender').text(row.find('.kode-tender').text());
        clone.find('.hps').text(row.find('.hps').text());
        clone.find('.no-evaluasi').text(row.find('.no-evaluasi').text());
        clone.find('.tanggal').text(row.find('.tanggal').text());
        clone.find('.unit-kerja').text(row.find('.unit-kerja').text());
        clone.find('.nama-hadir').text(row.find('.nama-hadir').text());
        clone.find('.jabatan').text(row.find('.jabatan').text());
        clone.find('.tahun-anggaran').text(row.find('.tahun-anggaran').text());
        clone.find('.pagu').text(row.find('.pagu').text());
        clone.find('.hps').text(row.find('.hps').text());
        clone.find('.alamat').text(row.find('.alamat').text());
        clone.find('.nama-penyedia').text(row.find('.nama-penyedia').text());
        clone.find('.harga-terkoreksi').text(row.find('.harga-terkoreksi').text());
        clone.find('.harga-negosiasi').text(row.find('.harga-negosiasi').text());
        clone.find('.harga-pembulatan').text(row.find('.harga-pembulatan').text());
        clone.find('.keterangan-lain').text(row.find('.keterangan-lain').text());
        clone.find('.pokja-pemilihan').text(row.find('.pokja-pemilihan').text());


        $('#halamancetak').html(clone.html());
        printContent();
    });
    </script>
</body>

</html>