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
        <h1 class="h3 mb-2 text-gray-800">Informasi Tender</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <button class="btn btn-primary mb-3" id="printAllBtn">Cetak Data</button>
                    <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; foreach ($pakets as $paket): ?>
                            <tr>
                                <td><?= $counter ?></td>
                                <td>
                                    <?php
                                        // Pecah string ID Pokja menjadi array
                                        $selected_ids = explode(',', $paket->Id_pokja);
                                        
                                        // Inisialisasi array untuk menyimpan nama-nama pokja
                                        $pokja_names = array();

                                        // Ambil nama-nama pokja sesuai dengan ID yang dipilih
                                        foreach ($selected_ids as $selected_id) {
                                            foreach ($pokjas as $pokja) {
                                                if ($pokja->id == $selected_id) {
                                                    $pokja_names[] = $pokja->Nama;
                                                    break;
                                                }
                                            }
                                        }

                                        // Tampilkan nama-nama pokja yang dipilih, dipisahkan dengan koma
                                        echo implode(', ', $pokja_names);
                                    ?>
                                </td>
                                <td><?= $paket->Nama_tender ?></td>
                                <td><?= $paket->Nilai_Pagu ?></td>
                                <td><?= $paket->Kode_RUP ?></td>
                                <td><?= $paket->Nilai_HPS ?></td>
                                <td><?= $paket->Kode_anggaran ?></td>
                                <td><?= $paket->Metode_tender ?></td>
                                <td><?= $paket->Nama_PPK ?></td>
                                <td><?= $paket->Tgl_penugasan ?></td>
                                <td><?= $paket->Pokja_pemilihan ?></td>

                            </tr>
                            <?php  $counter++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Printable Section -->
    <div id="halamancetak" style="display: none;">
        <div class="printable">
            <table width="100%">
                <tr style="border-bottom: 1px solid black">
                    <td colspan="2">
                        <table width="100%" style="text-align: center;line-height:1.3em">
                            <tr>
                                <td rowspan="7">
                                    <img style="max-width: 120px; max-height: 120px;"
                                        src="<?php echo base_url('assets/img/tapin.png'); ?>" alt="Deskripsi Gambar" />
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
                    <td>&nbsp; </td>
                </tr>

                <tr>
                    <td>&nbsp; </td>
                </tr>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
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
                    </tr>
                </thead>
                <tbody id="printableContent">
                </tbody>
            </table>
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

    $('#printAllBtn').on('click', function() {
        var allPrintContents = '';
        $('#example tbody tr').each(function() {
            var row = $(this);
            allPrintContents += '<tr>';
            allPrintContents += '<td>' + row.find('td:eq(0)').text() + '</td>';
            allPrintContents += '<td>' + row.find('td:eq(1)').text() + '</td>';
            allPrintContents += '<td>' + row.find('td:eq(2)').text() + '</td>';
            allPrintContents += '<td>' + row.find('td:eq(3)').text() + '</td>';
            allPrintContents += '<td>' + row.find('td:eq(4)').text() + '</td>';
            allPrintContents += '<td>' + row.find('td:eq(5)').text() + '</td>';
            allPrintContents += '<td>' + row.find('td:eq(6)').text() + '</td>';
            allPrintContents += '<td>' + row.find('td:eq(7)').text() + '</td>';
            allPrintContents += '<td>' + row.find('td:eq(8)').text() + '</td>';
            allPrintContents += '<td>' + row.find('td:eq(9)').text() + '</td>';
            allPrintContents += '<td>' + row.find('td:eq(10)').text() + '</td>';
            allPrintContents += '</tr>';
        });

        $('#printableContent').html(allPrintContents);
        printContent();
    });
    </script>
</body>

</html>