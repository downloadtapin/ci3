<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat Permohonan</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
            padding: 8px;
        }

        .no-border td {
            border: none;
        }
    }

    .container {
        margin: 20mm;
    }
    </style>
</head>

<body>

    <button class="btn btn-primary m-3" onclick="printContent('component1')">Cetak Surat Permohonan <i
            class="fas fa-print"></i></button>

    <?php
        $isReviewVisible = true;
        $showUploadForm = false;
        $uploadedImageURL = "path/to/uploaded/image.jpg"; // Replace with actual image URL
        $logo = "path/to/logo.jpg"; // Replace with actual logo path
        $namaSKPD = "Nama SKPD";
        $alamatInstansi = "Alamat Instansi";
        $tanggalSurat = "Tanggal Surat";
        $nomorSurat = "Nomor Surat";
        $jabatan = "Jabatan";
        $namaPenandaTangan = "Nama Penanda Tangan";
        $pangkat = "Pangkat";
        $nip = "NIP";
        $formData = [
            ["firstName" => "Nama Paket 1", "lastName" => "Pagu 1"],
            ["firstName" => "Nama Paket 2", "lastName" => "Pagu 2"]
        ];
    ?>

    <?php if ($isReviewVisible): ?>
    <div class="review-section mt-3 ukuran2">
        <div style="background: gray; padding: 2em;">
            <div id="component1" class="printable"
                style="background: white; padding: 2em 5em 5em 5em;width: 24cm; height: 29cm">

                <table style="font-family:Bookman Old Style, serif;color:black;">
                    <tr class="no-border">
                        <td class="no-border">
                            <table class="no-border" style="line-height:1em">
                                <tr style="border-bottom: 1px solid black">
                                    <td colspan="2" class="no-border">
                                        <table width="100%" style="text-align: center;line-height:1em">
                                            <tr>
                                                <td rowspan="7">
                                                    <img style="max-width: 90px; max-height: 90px;"
                                                        src="<?php echo base_url('assets/img/tapin.png'); ?>"
                                                        alt="Deskripsi Gambar" />
                                                </td>
                                            </tr>
                                            <tr style="font-size:  18px;">
                                                <td>
                                                    PEMERINTAH KABUPATEN TAPIN
                                                </td>
                                            </tr>
                                            <tr style="font-size:  18px;">
                                                <td>
                                                    SEKRETARIAT DAERAH
                                                </td>
                                            </tr>
                                            <tr style="font-weight: bold;font-size:  18px; ">
                                                <td>
                                                    UNIT KERJA PENGADAAN BARANG/JASA
                                                </td>
                                            </tr>
                                            <tr style="font-size:  18px;">
                                                <td>
                                                    KELOMPOK KERJA PEMILIHAN 354
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px;">
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
                                    <td colspan="2" class="no-border">
                                        <table width="100%" style="line-height:1.2em">
                                            <tr>
                                                <td colspan="2"
                                                    style="text-align: center; font-weight: bold;font-size: 20px; text-decoration: underline">
                                                    BERITA ACARA REVIU DOKUMEN PERSIAPAN PENGADAAN
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center; font-size: 13px">
                                                    Nomor : 0003.3/02/Pokja354/Reviu-Nor.sei.Sakaray.CLS/X/2023
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; font-size: 15px">
                                                    kami yang bertanda tangan di bawah ini Pokja Pemilihan 354 Unit
                                                    Kerja Pengadaan Barang/Jasa Kabupaten Tapin bersama dengan Pejabat
                                                    Pembuat Komitmen (PPK), yaitu:
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" font-size: 15px">
                                        <table>
                                            <tr>
                                                <td style="width: 200px">
                                                    Tanggal
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    25 Oktober 2023
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nama PPK
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    MULKAN ADLI, ST
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    SKPD/OPD
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    Bidang SDA, Dinas PUPR Kabupaten Tapin
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nomor SK PPK
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    15/SK/PPK/DPUPR/SEKRT/1/2023
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td class="no-border">
                                        telah mengadakan Reviu Dokumen Persiapan Pengadaan untuk:
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td style=" font-size: 15px; vertical-align: top">
                                        <table style=" font-size: 15px">
                                            <tr>
                                                <td style="width: 200px;vertical-align: top">
                                                    Nama Paket Pekerjaan
                                                </td>
                                                <td style="vertical-align: top">
                                                    :
                                                </td>
                                                <td style="vertical-align: top">
                                                    Normalisasi Sungai Saka Datu Beserta Ray Desa Sungai Salai Kecamatan
                                                    Candi Laras Utara
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
                                                    APBD Kabupaten Tapin Tahun Anggaran 2023
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Kode Rekening
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    1.03.02.2.01.46.5.1.02.03.04.0051.0.0.0.00.00.00.000.00000
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td style=" font-size: 15px">
                                        Dalam pembahasan ini telah dilakukan reviu terhadap Dokumen Persiapan Pengadaan
                                        meliputi Spesifikasi Teknis, Harga Perkiraan Sendiri (HPS), Rancangan Kontrak,
                                        Dokumen Anggaran Belanja, ID paket RUP, waktu penggunaan barang/jasa, serta
                                        analisis pasar. Hasil reviu terhadap dokumen-dokumen tersebut adalah sesuai
                                        dengan lampiran.
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td style=" font-size: 15px">
                                        Demikian Berita Acara ini dibuat dan ditanda tangani pada Hari , Tanggal , Bulan
                                        dan Tahun sebagaimana tersebut diatas untuk di pergunakan sebagaimana mestinya.
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td class="no-border">
                                        <table style="text-align: center; font-size: 15px; width:100%">
                                            <tr>
                                                <td>
                                                    Pejabat Pembuat Komitmen
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bidang SDA, Dinas PUPR Kabupaten Tapin
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
                                                    MULKAN ADLI, ST
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    NIP. 19731114 201001 1 006
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    UKPBJ Kabupaten Tapin
                                                </td>
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
                                                <td>
                                                    Pokja Pemilihan 354
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


            <p><br /></p>
            <p><br /></p>
        </div>
    </div>
    </div>
    <?php endif; ?>

    <script>
    function printContent(id) {
        var content = document.getElementById(id).innerHTML;
        var myWindow = window.open('', 'Print', 'height=600,width=800');
        myWindow.document.write('<html><head><title>Print</title>');
        myWindow.document.write('<link rel="stylesheet" href="styles.css" type="text/css" />');
        myWindow.document.write('</head><body>');
        myWindow.document.write(content);
        myWindow.document.write('</body></html>');
        myWindow.document.close();
        myWindow.focus();
        myWindow.print();
        myWindow.close();
    }
    </script>
</body>

</html>