<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form action="<?= site_url('user/edit/'.$user->id_user) ?>" method="post">
            <div class="form-group">
                <label for="id_pokja">Pokja ID:</label>
                <input type="text" class="form-control" id="id_pokja" name="id_pokja" value="<?= $user->id_pokja ?>" required>
            </div>
            <div class="form-group">
                <label for="Username">Username:</label>
                <input type="text" class="form-control" id="Username" name="Username" value="<?= $user->Username ?>" required>
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="password" class="form-control" id="Password" name="Password" value="<?= $user->Password ?>" required>
            </div>
            <div class="form-group">
                <label for="Level">Level:</label>
                <input type="text" class="form-control" id="Level" name="Level" value="<?= $user->Level ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
