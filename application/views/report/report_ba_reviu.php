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
                                <th>No Dokumen Pemilihan</th>
                                <th>Nilai Pagu</th>
                                <th>Kode RUP</th>
                                <th>Nilai HPS</th>
                                <th>Kode Anggaran</th>
                                <th>Metode Tender</th>
                                <th>Nama PPK</th>
                                <th>Unit Kerja</th>
                                <th hidden="true">No SK</th>
                                <th>NIP PPK</th>
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
                                <td class="no-dokumen-pemilihan"><?= $paket->no_dokumen_pemilihan ?></td>
                                <td class="nilai-pagu">Rp. <?= $paket->Nilai_Pagu ?></td>
                                <td class="kode-rup"><?= $paket->Kode_RUP ?></td>
                                <td class="nilai-hps">Rp. <?= $paket->Nilai_HPS ?></td>
                                <td class="kode-anggaran"><?= $paket->Kode_anggaran ?></td>
                                <td class="metode-tender"><?= $paket->Metode_tender ?></td>
                                <td class="nama-ppk"><?= $paket->Nama_PPK ?></td>
                                <td class="unit-kerja"><?= $paket->Unit_kerja ?></td>

                                <td hidden="true" class="no-sk"><?= $paket->No_SK ?></td>
                                <td class="nip-ppk"><?= $paket->NIP_PPK ?></td>
                                <td class="tgl-penugasan"><?= $paket->Tgl_penugasan ?></td>
                                <td class="pokja-pemilihan"><?= $paket->Pokja_pemilihan ?></td>
                                <td>
                                    <button class="btn btn-primary cetak-btn" data-id="<?= $paket->Id_kode_tender ?>">
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
                                                    BERITA ACARA REVIU DOKUMEN PERSIAPAN PENGADAAN
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center; font-size: 17px">
                                                    Nomor : <span class="no-dokumen-pemilihan"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 17px; text-align : justify">
                                                    kami yang bertanda tangan di bawah ini Pokja Pemilihan <span class="pokja-pemilihan"></span> Unit
                                                    Kerja Pengadaan Barang/Jasa Kabupaten Tapin bersama dengan
                                                    Pejabat
                                                    Pembuat Komitmen (PPK), yaitu:
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
                                                <td class="tgl-penugasan">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nama PPK
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="nama-ppk">

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    SKPD/OPD
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="unit-kerja">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nomor SK PPK
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="no-sk">

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td>
                                        telah mengadakan Reviu Dokumen Persiapan Pengadaan untuk:
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td style=" font-size: 17px; vertical-align: top">
                                        <table style=" font-size: 17px">
                                            <tr>
                                                <td style="width: 200px;vertical-align: top">
                                                    Nama Paket Pekerjaan
                                                </td>
                                                <td style="vertical-align: top">
                                                    :
                                                </td>
                                                <td style="vertical-align: top" class="nama-tender">
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
                                                <td class="kode-rup">

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
                                    <td style=" font-size: 17px; text-align : justify">
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
                                                    Pejabat Pembuat Komitmen
                                                </td>
                                                <td>
                                                    UKPBJ Kabupaten Tapin
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-transform: uppercase">
                                                    <span class="unit-kerja"></span>
                                                </td>
                                                <td class="nip-ppk">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                                <td>
                                                    ttd
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp; </td>
                                                <td>&nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td style="text-transform: uppercase;">
                                                    <u><span class="nama-ppk"></span></u>
                                                </td>
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
        clone.find('.nama-tender').text(row.find('.nama-tender').text());
        clone.find('.no-dokumen-pemilihan').text(row.find('.no-dokumen-pemilihan').text());
        clone.find('.nilai-pagu').text(row.find('.nilai-pagu').text());
        clone.find('.kode-rup').text(row.find('.kode-rup').text());
        clone.find('.nilai-hps').text(row.find('.nilai-hps').text());
        clone.find('.kode-anggaran').text(row.find('.kode-anggaran').text());
        clone.find('.metode-tender').text(row.find('.metode-tender').text());
        clone.find('.nama-ppk').text(row.find('.nama-ppk').text());
        clone.find('.unit-kerja').text(row.find('.unit-kerja').text());
        clone.find('.no-sk').text(row.find('.no-sk').text());
        clone.find('.nip-ppk').text(row.find('.nip-ppk').text());
        clone.find('.tgl-penugasan').text(row.find('.tgl-penugasan').text());
        clone.find('.pokja-pemilihan').text(row.find('.pokja-pemilihan').text());

        $('#halamancetak').html(clone.html());
        printContent();
    });
    </script>
</body>

</html>