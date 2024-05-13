<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>List Users</h2>
        <a href="<?= site_url('user/add') ?>" class="btn btn-primary mb-3">Tambah User</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pokja ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id_user ?></td>
                    <td><?= $user->id_pokja ?></td>
                    <td><?= $user->Username ?></td>
                    <td><?= $user->Password ?></td>
                    <td><?= $user->Level ?></td>
                    <td>
                        <a href="<?= site_url('user/edit/'.$user->id_user) ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= site_url('user/delete/'.$user->id_user) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
