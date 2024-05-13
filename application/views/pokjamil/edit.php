<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pokja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Pokja</h2>
        <form action="<?= site_url('pokjamil/edit/'.$pokja->Id_pokja) ?>" method="post">
            <div class="form-group">
                <label for="User_ID">User ID:</label>
                <input type="text" class="form-control" id="User_ID" name="User_ID" value="<?= $pokja->User_ID ?>" required>
            </div>
            <div class="form-group">
                <label for="Nama">Nama:</label>
                <input type="text" class="form-control" id="Nama" name="Nama" value="<?= $pokja->Nama ?>" required>
            </div>
            <div class="form-group">
                <label for="NIK">NIK:</label>
                <input type="text" class="form-control" id="NIK" name="NIK" value="<?= $pokja->NIK ?>" required>
            </div>
            <div class="form-group">
                <label for="NIP_Pokjamil">NIP PokjaMil:</label>
                <input type="text" class="form-control" id="NIP_Pokjamil" name="NIP_Pokjamil" value="<?= $pokja->NIP_Pokjamil ?>" required>
            </div>
            <div class="form-group">
                <label for="No_telp">No. Telp:</label>
                <input type="text" class="form-control" id="No_telp" name="No_telp" value="<?= $pokja->No_telp ?>" required>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" class="form-control" id="Email" name="Email" value="<?= $pokja->Email ?>" required>
            </div>
            <div class="form-group">
                <label for="No_sertifikat">No. Sertifikat:</label>
                <input type="text" class="form-control" id="No_sertifikat" name="No_sertifikat" value="<?= $pokja->No_sertifikat ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
