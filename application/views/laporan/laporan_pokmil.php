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
        <h1 class="h3 mb-2 text-gray-800">INFORMASI POKJA</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>No Telpon</th>
                            
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($pokjas as $pokjamils): ?>
                            <tr>
                                <td class=""><?= $no ?></td> 
                                <td class="nama"><?= $pokjamils->Nama ?></td> 
                                <td class="nip"><?= $pokjamils->NIP_Pokjamil ?></td> 
                                <td class="no_telp"><?= $pokjamils->No_telp ?></td> 
                                <td class="nik" hidden="true"><?= $pokjamils->NIK ?></td>  
                                <td class="alamat" hidden="true"><?= $pokjamils->Alamat ?></td>  
                                <td class="email" hidden="true"><?= $pokjamils->Email ?></td>  
                                <td class="pangkat" hidden="true"><?= $pokjamils->Pangkat ?></td>  
                                <td class="jabatan" hidden="true"><?= $pokjamils->Jabatan ?></td>  
                                <td class="golongan" hidden="true"><?= $pokjamils->Golongan ?></td>  
                                <td class="no_sertifikat" hidden="true"><?= $pokjamils->No_sertifikat ?></td>  
                                <td>
                                    <button class="btn btn-primary cetak-btn" data-id="<?= $pokjamils->id ?>">
                                        <i class="bi bi-printer"></i></button>
                                </td>
                            </tr>
                            <?php 
                            $no++;
                            endforeach; ?>
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
                                                    INFORMASI POKJA

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style=" font-size: 17px">
                                        <table style="line-height: 2em; font-size: 20px">
                                            <tr>
                                                <td style="width: 200px">
                                                    Nama
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="nama">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    NIK
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="nik">

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    NIP
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="nip">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    alamat
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="alamat">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    No Telpon
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="no_telp">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Email
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="email">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Pangkat
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="pangkat">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Jabatan
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="jabatan">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Golongan
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="golongan">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    No Sertifikat
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="no_sertifikat">

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
        clone.find('.nama').text(row.find('.nama').text());
        clone.find('.nik').text(row.find('.nik').text());
        clone.find('.nip').text(row.find('.nip').text());
        clone.find('.alamat').text(row.find('.alamat').text());
        clone.find('.no_telp').text(row.find('.no_telp').text());
        clone.find('.email').text(row.find('.email').text());
        clone.find('.pangkat').text(row.find('.pangkat').text());
        clone.find('.jabatan').text(row.find('.jabatan').text());
        clone.find('.golongan').text(row.find('.golongan').text());
        clone.find('.no_sertifikat').text(row.find('.no_sertifikat').text());
        


        $('#halamancetak').html(clone.html());
        printContent();
    });
    </script>
</body>

</html>