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
        <h1 class="h3 mb-2 text-gray-800">BERITA ACARA REVIU</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Pokja</th>
                                <th>Nama Tender</th>
                                <th>Nilai Pagu</th>
                                <th>Kode RUP</th>
                                <th>Nilai HPS</th>
                                <th>Kode Anggaran</th>
                                <th>Metode Tender</th>
                                <th>Nama PPK</th>
                                <th>Tanggal Penugasan</th>
                                <th>Pokja Pemilihan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pakets as $paket): ?>
                            <tr>
                                <td class="nama-pokja">
                                    <?php
                                    $selected_ids = explode(',', $paket->Id_pokja);
                                    $pokja_names = array();
                                    foreach ($selected_ids as $selected_id) {
                                        foreach ($pokjas as $pokja) {
                                            if ($pokja->id == $selected_id) {
                                                $pokja_names[] = $pokja->Nama;
                                                break;
                                            }
                                        }
                                    }
                                    echo implode(', ', $pokja_names);
                                    ?>
                                </td>
                                <td class="nama-tender"><?= $paket->Nama_tender ?></td>
                                <td class="nilai-pagu"><?= $paket->Nilai_Pagu ?></td>
                                <td class="kode-rup"><?= $paket->Kode_RUP ?></td>
                                <td class="nilai-hps"><?= $paket->Nilai_HPS ?></td>
                                <td class="kode-anggaran"><?= $paket->Kode_anggaran ?></td>
                                <td class="metode-tender"><?= $paket->Metode_tender ?></td>
                                <td class="nama-ppk"><?= $paket->Nama_PPK ?></td>
                                <td class="tgl-penugasan"><?= $paket->Tgl_penugasan ?></td>
                                <td class="pokja-pemilihan"><?= $paket->Pokja_pemilihan ?></td>
                                <td>
                                    <button class="btn btn-primary cetak-btn"
                                        data-id="<?= $paket->Id_kode_tender ?>">Cetak
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
                                                        <span class="pokja-pemilihan"></span>
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
                                                        Kerja Pengadaan Barang/Jasa Kabupaten Tapin bersama dengan
                                                        Pejabat
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
                                                        <span class="nama-ppk"></span>
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
                                                    <td style="vertical-align: top" class="nama-paket">
                                                        <!-- This will be filled dynamically -->
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
                                            Dalam pembahasan ini telah dilakukan reviu terhadap Dokumen Persiapan
                                            Pengadaan
                                            meliputi Spesifikasi Teknis, Harga Perkiraan Sendiri (HPS), Rancangan
                                            Kontrak,
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
                                            Demikian Berita Acara ini dibuat dan ditanda tangani pada Hari , Tanggal ,
                                            Bulan
                                            dan Tahun sebagaimana tersebut diatas untuk di pergunakan sebagaimana
                                            mestinya.
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
                                                        <span class="nama-ppk"></span>
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

    <!-- Modal -->
    <div class="modal fade" id="printPreviewModal" tabindex="-1" aria-labelledby="printPreviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="margin: auto">
                <div class="modal-header">
                    <h5 class="modal-title" id="printPreviewModalLabel">Reviu Cetak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="halamancetak-preview"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="printButton">Cetak</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const cetakButtons = document.querySelectorAll('.cetak-btn');
        cetakButtons.forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const namaPokja = row.querySelector('.nama-pokja').textContent;
                const namaTender = row.querySelector('.nama-tender').textContent;
                const nilaiPagu = row.querySelector('.nilai-pagu').textContent;
                const kodeRup = row.querySelector('.kode-rup').textContent;
                const nilaiHps = row.querySelector('.nilai-hps').textContent;
                const kodeAnggaran = row.querySelector('.kode-anggaran').textContent;
                const metodeTender = row.querySelector('.metode-tender').textContent;

                // Perbarui nilai namaPpk dengan nilai PPK dari baris yang sesuai
                const namaPpk = row.querySelector('.nama-ppk').textContent;

                const tglPenugasan = row.querySelector('.tgl-penugasan').textContent;
                const pokjaPemilihan = row.querySelector('.pokja-pemilihan').textContent;

                // Update printable content with selected row data
                document.querySelector('#halamancetak .nama-paket').textContent = namaTender;
                document.querySelector('#halamancetak .nama-ppk').textContent = namaPpk;
                document.querySelector('#halamancetak .pokja-pemilihan').textContent = pokjaPemilihan;

                const halamancetakContent = document.getElementById('halamancetak').innerHTML;
                document.getElementById('halamancetak-preview').innerHTML = halamancetakContent;

                $('#printPreviewModal').modal('show');
            });
        });

        document.getElementById('printButton').addEventListener('click', function() {
            printContent('halamancetak-preview');
        });
    });


    function printContent(id) {
        const content = document.getElementById(id).innerHTML;
        const myWindow = window.open('', 'Print', 'height=600,width=800');
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