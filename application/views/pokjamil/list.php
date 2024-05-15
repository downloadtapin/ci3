<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List PokjaMil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>List PokjaMil</h2>
        <a href="<?= site_url('pokjamil/add') ?>" class="btn btn-primary mb-3">Add PokjaMil</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Level</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>NIP</th>
                    <th>User ID</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Email</th>
                    <th>Pangkat</th>
                    <th>Jabatan</th>
                    <th>Golongan</th>
                    <th>No. Sertifikat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pokjas as $pokjamil): ?>
                <tr>
                    <td><?= $pokjamil->Level ?></td>
                    <td><?= $pokjamil->Nama ?></td>
                    <td><?= $pokjamil->NIK ?></td>
                    <td><?= $pokjamil->NIP_Pokjamil ?></td>
                    <td><?= $pokjamil->User_ID ?></td>
                    <td><?= $pokjamil->Alamat ?></td>
                    <td><?= $pokjamil->No_telp ?></td>
                    <td><?= $pokjamil->Email ?></td>
                    <td><?= $pokjamil->Pangkat ?></td>
                    <td><?= $pokjamil->Jabatan ?></td>
                    <td><?= $pokjamil->Golongan ?></td>
                    <td><?= $pokjamil->No_sertifikat ?></td>
                    <td>
                        <a href="<?= site_url('pokjamil/edit/' . $pokjamil->id) ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= site_url('pokjamil/delete/' . $pokjamil->id) ?>" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this PokjaMil?')">Delete</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>