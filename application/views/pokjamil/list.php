<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Pokjas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">

        <h2>List Pokjas</h2>
        <a href="<?= site_url('pokjamil/add') ?>" class="btn btn-primary mb-3">Tambah Pokja</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>NIP PokjaMil</th>
                    <th>No. Telp</th>
                    <th>Email</th>
                    <th>No. Sertifikat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pokjas as $pokja): ?>
                <tr>
                    <td><?= $pokja->Id_pokja ?></td>
                    <td><?= $pokja->User_ID ?></td>
                    <td><?= $pokja->Nama ?></td>
                    <td><?= $pokja->NIK ?></td>
                    <td><?= $pokja->NIP_Pokjamil ?></td>
                    <td><?= $pokja->No_telp ?></td>
                    <td><?= $pokja->Email ?></td>
                    <td><?= $pokja->No_sertifikat ?></td>
                    <td>
                        <a href="<?= site_url('pokjamil/edit/'.$pokja->Id_pokja) ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= site_url('pokjamil/delete/'.$pokja->Id_pokja) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this pokja?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
