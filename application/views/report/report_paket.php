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
                    <tr>
                        <td style="border: 1px solid black">
                            <table border>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%" style="text-align: center;line-height:1.2em">
                                            <tr>
                                                <td rowspan="5">
                                                    <img style="max-width: 80px; max-height: 80px;"
                                                        src="<?php echo base_url('assets/img/tapin.png'); ?>"
                                                        alt="Deskripsi Gambar" />
                                                </td>
                                            </tr>
                                            <tr style="font-weight: bold; ">
                                                <td>
                                                    PEMERINTAH KABUPATEN TAPIN
                                                </td>
                                            </tr>
                                            <tr style="font-size: 30px;font-weight: bold;">
                                                <td>
                                                    SEKRETARIAT DAERAH
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 15px;">
                                                    Jalan Brigjend H. Hasan Basry, Komp. Islamic Center No. 22 Telp.
                                                    (0517)
                                                    31961-31966
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
                                    <td colspan="2">
                                        <table width="100%" style="line-height:1.2em" border>
                                            <tr style="border: 1px solid black">
                                                <td colspan="2" style="text-align: center; font-weight: bold">LEMBAR
                                                    PENUGASAN POKJA
                                                    PEMILIHAN</td>
                                            </tr>
                                            <tr style="border: 1px solid black">
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                Surat Dari
                                                            </td>
                                                            <td>
                                                                : DPUPR
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Nomor Surat
                                                            </td>
                                                            <td>
                                                                : 12312/adas/2131/123
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Tanggal Surat
                                                            </td>
                                                            <td>
                                                                : 30 oktober 2023
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                Diterima Tanggal
                                                            </td>
                                                            <td>
                                                                : 30 Oktober 2023
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                &nbsp;
                                                            </td>
                                                            <td>
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Sifat
                                                            </td>
                                                            <td>
                                                                : Penting
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%">
                                            <tr>
                                                <td width="150px">
                                                    Nama Paket :
                                                </td>
                                                <td>
                                                    Normalisasi Sungai Saka Datu Beserta Ray Desa Sungai Salai Kecamatan
                                                    Candi
                                                    Laras Utara
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border: 1px solid black">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    Nomor
                                                </td>
                                                <td>
                                                    : 000.3.3/535/PP-354/BPBJ/2023
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Diteruskan kepada pokja pemilihan
                                                </td>
                                                <td>
                                                    : 354
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>

                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%" style="line-height:2em">
                                            <tr>
                                                <td colspan="2">
                                                    Dengan Hormat Harap :
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <span style="font-size:30px; vertical-align: middle">O</span> Tanggapan dan Saran
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span style="font-size:30px; vertical-align: middle">O</span> Proses lebih Lanjut
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <span style="font-size:30px; vertical-align: middle">O</span> Koordinasi /Konfirmasikan
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">

                                    </td>
                                    <td>
                                        <table width="100%" style="text-align: center">
                                            <tr>
                                                <td>
                                                    Rantau, 30 October 2023
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Kepala Bagian Pengadaan Barang /Jasa
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height: 100px">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold; text-decoration: underline;">
                                                    IHYA INNAL AKRIMULLAH, SH, MM
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold">
                                                    NIP. 198104152005011004
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="border: 1px solid black">
                                    <td colspan="2">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    Catatan :
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Penugasan Nama-Nama Ybs Pokja Pemilihan Dapat Di Lihat Di Aplikasi :
                                                    Ipse.tapinkab.go.id
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