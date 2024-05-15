<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List Pakets</title>
    <style>
    /* Adjust table width and column width if necessary */
    .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody {
        max-height: 400px;
        width: 100%;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>List Pakets</h2>
        <a href="<?= site_url('paket/add') ?>" class="btn btn-primary mb-3">Add Paket</a>
        <table id="example" class="table table-striped">
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
                    <td>
                        <a href="<?= site_url('paket/edit/'.$paket->Id_kode_tender) ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= site_url('paket/delete/'.$paket->Id_kode_tender) ?>" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this paket?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            "processing": true,
            "columnDefs": [{
                    "width": "30%",
                    "targets": [2]
                } // Set width for the eighth column (Alamat)
            ]
        });

    });
    </script>

</body>

</html>