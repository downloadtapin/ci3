<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add User</h2>
        <form action="<?= site_url('user/add') ?>" method="post">
            <div class="form-group">
                <label for="id_pokja">Pokja ID:</label>
                <input type="text" class="form-control" id="id_pokja" name="id_pokja" required>
            </div>
            <div class="form-group">
                <label for="Username">Username:</label>
                <input type="text" class="form-control" id="Username" name="Username" required>
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="password" class="form-control" id="Password" name="Password" required>
            </div>
            <div class="form-group">
                <label for="Level">Level:</label>
                <input type="text" class="form-control" id="Level" name="Level" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
