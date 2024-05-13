<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Pakets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>List Pakets</h2>
        <a href="<?= site_url('paket/add') ?>" class="btn btn-primary mb-3">Add Paket</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Kode Tender</th>
                    <th>Nama Pokja</th>
                    <th>Nama Tender</th>
                    <th>Nilai Pagu</th>
                    <th>Kode RUP</th>
                    <th>Nilai HPS</th>
                    <th>Kode Anggaran</th>
                    <th>Metode Tender</th>
                    <th>Nama PPK</th>
                    <th>NIP PPK</th>
                    <th>No. SK</th>
                    <th>Unit Kerja</th>
                    <th>Tanggal Permohonan</th>
                    <th>Tanggal Penugasan</th>
                    <th>Pokja Pemilihan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pakets as $paket): ?>
                <tr>
                    <td><?= $paket->Id_kode_tender ?></td>
                    <td>
                        <?php
                            // Pecah string ID Pokja menjadi array
                            $selected_ids = explode(',', $paket->Id_pokja);
                            
                            // Inisialisasi array untuk menyimpan nama-nama pokja
                            $pokja_names = array();

                            // Ambil nama-nama pokja sesuai dengan ID yang dipilih
                            foreach ($selected_ids as $selected_id) {
                                foreach ($pokjas as $pokja) {
                                    if ($pokja->Id_pokja == $selected_id) {
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
                    <td><?= $paket->NIP_PPK ?></td>
                    <td><?= $paket->No_SK ?></td>
                    <td><?= $paket->Unit_kerja ?></td>
                    <td><?= $paket->Tgl_permohonan ?></td>
                    <td><?= $paket->Tgl_penugasan ?></td>
                    <td><?= $paket->Pokja_pemilihan ?></td>
                    <td>
                        <a href="<?= site_url('paket/edit/'.$paket->Id_kode_tender) ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= site_url('paket/delete/'.$paket->Id_kode_tender) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this paket?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

