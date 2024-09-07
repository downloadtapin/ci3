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
                                <td class="alamat" hidden="true">
                                    <?php 
                                        foreach ($pembuktians as $pembuktian) {
                                            if ($pembuktian->Id_evaluasi_penawaran == $klarifikasi->Id_evaluasi_penawaran) {
                                                echo $pembuktian->Alamat;
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
                                <td class="tahun-anggaran" hidden="true">
                                    <?php 
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $klarifikasi->Id_evaluasi_penawaran) {
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
                                <td class="hps" hidden="true">
                                    <?php 
                                        // Cari Id_kode_tender di tabel evaluasi menggunakan Id_evaluasi_penawaran dari tabel klarifikasi
                                        foreach ($evaluasis as $evaluasi) {
                                            if ($evaluasi->Id_evaluasi_penawaran == $klarifikasi->Id_evaluasi_penawaran) {
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
                                                echo 'Rp '  . $negosiasi->harga_penawaran ;
                                                break;
                                            }
                                        }
                                        ?>
                                </td>
                                <td class="harga-negosiasi">
                                    <?php 
                                        foreach ($negosiasis as $negosiasi) {
                                            if ($negosiasi->Id_negosiasi == $klarifikasi->Id_evaluasi_penawaran) {
                                                echo 'Rp '  . $negosiasi->harga_negosiasi ;
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
                                        <table width="100%" style="line-height: 1.2em">
                                            <tr>
                                                <td colspan="2"
                                                    style="text-align: center; font-weight: bold;font-size: 20px; ">
                                                    BERITA ACARA
                                                    <br> KLARIFIKASI ADMINISTRASI, KUALIFIKASI, NEGOSIASI TEKNIS DAN
                                                    HARGA/BIAYA
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center; font-size: 17px">
                                                    Nomor : <span class="no-klarifikasi"></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style=" font-size: 17px">
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
                                                    Paket Pekerjaan
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="nama-paket">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Lokasi
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    Rantau
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Sumber Dana
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    APBD Kabupaten Tapin Tahun Anggaran <span
                                                        class="tahun-anggaran"></span>
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
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: justify; line-height: 1em">
                                        kami Pokja Pemilihan <span class="pokja-pemilihan"></span>, bertempat di Kantor UKPBJ Kabupaten
                                        Tapin yang
                                        beralamat di Jl. Brigjend. H.Hasan Basry Km.1,5 Komplek Islamic Center - Rantau,
                                        yang bertanda tangan dibawah ini Pokja Pemilihan <span class="pokja-pemilihan"></span>, telah
                                        melaksanakan
                                        klarifikasi, administrasi, kualifikasi, teknis dan negosiasi harga/biaya untuk
                                        paket pekerjaan tersebut diatas sebelum penetapan pemenang sesuai ketentuan IKP
                                        34.3 dan 34.4 dengan hasil terlampir :
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table style="width: 100%">
                                            <tr>
                                                <td>1.</td>
                                                <td>Aspek-aspek Administrasi dan Kualifikasi yaitu :
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    a. Sisa Kepampuan Paket ( IKP 34.3 ), terlampir ;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>
                                                    Aspek-aspek Teknis yaitu :
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    a. Peralatan Utama ( IKP 34.4 hurup a,b,c ) terlampir ;
                                                    <br>b. Personil Manajerial ( IKP 34.4 hurup d,e,f ) terlampir ;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>
                                                    Aspek-aspek harga /biaya negosiasi yaitu :
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="text-align: justify; line-height: 1em">
                                                    a. Kesesuaian rencana kerja dengan jenis pengeluaran biaya
                                                    <br>b. Volume kegiatan dan jenis pengeluaran
                                                    <br>c. Biaya satuan dibandingkan dengan HPS dan biaya yang berlaku
                                                    dipasaran

                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="text-align: justify; line-height: 1em">
                                                    Berdasarkan bukti dukung yang ada, Pokja Pemilihan 354 menilai bahwa
                                                    harga
                                                    penawaran tersebut sesuai dengan harga yang berlaku di pasaran
                                                    sehingga masih
                                                    dalam batas kewajaran.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="text-align: justify; line-height: 1em">
                                                    Dalam hal terdapat harga satuan yang lebih tinggi dari 110% HPS,
                                                    harga satuan
                                                    tersebut hanya berlaku untuk volume sesuai dengan Daftar Kuantitas
                                                    dan Harga.
                                                    Jika terjadi penambahan volume, harga satuan yang berlaku
                                                    disesuaikan dengan
                                                    harga dalam HPS. Apabila terdapat mata pembayaran yang harganya nol
                                                    atau tidak
                                                    ditulis maka kegiatan tersebut harus tetap dilaksanakan. Harganya
                                                    dianggap
                                                    termasuk dalam harga pekerjaan lainnya.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    d. Hasil negosiasi harga sebagai berikut
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="2">
                                                    <table style="width: 100%" border>
                                                        <tr>
                                                            <td>
                                                                No.
                                                            </td>
                                                            <td>
                                                                Nama Perusahaan
                                                            </td>
                                                            <td>
                                                                Harga Terkoreksi
                                                            </td>
                                                            <td>
                                                                Harga Negosiasi Pembulatan
                                                            </td>
                                                            <td>
                                                                Ket.
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td class="nama-penyedia"></td>

                                                            <td class="harga-terkoreksi"></td>

                                                            <td class="harga-pembulatan"></td>
                                                            <td>Terlampir</td>
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
                                    <td style="vertical-align: top">3.</td>
                                    <td style="text-align: justify; line-height: 1em;">
                                        Berdasarkan hasil klarifikasi kualifikasi, teknis dan negosiasi harga tersebut,
                                        maka Pokja Pemilihan 354 berkesimpulan dapat ditetapkan sebagai pemenang dan
                                        negosiasi harga merupakan harga yang dapat dipertanggungjawabkan dan telah
                                        memenuhi syarat. Hasil akhir dari pemenang tender ini adalah sebagai berikut :
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <table colspan="2" style="width: 100%">
                                            <tr>
                                                <td>
                                                    Nama Perusahaan
                                                </td>
                                                <td>:</td>
                                                <td class="nama-penyedia">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    ALamat
                                                </td>
                                                <td>:</td>
                                                <td class="alamat"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Harga Penawaran
                                                </td>
                                                <td>:</td>
                                                <td class="harga-terkoreksi"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Harga Negosiasi
                                                </td>
                                                <td>:</td>
                                                <td class="harga-negosiasi"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Harga Pembulatan
                                                </td>
                                                <td>:</td>
                                                <td class="harga-pembulatan"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: justify; line-height: 1em">
                                        Demikian Berita Acara Klarifikasi Kualifikasi ( SKP ), Teknis (Personel,
                                        Peralatan) Negosiasi Harga dibuat dan ditanda tangani pada Hari , Tanggal ,
                                        Bulan dan Tahun sebagaimana tersebut diatas untuk di pergunakan sebagaimana
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


        $('#halamancetak').html(clone.html());
        printContent();
    });
    </script>
</body>

</html>