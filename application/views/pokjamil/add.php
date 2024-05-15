<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add PokjaMil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add PokjaMil</h2>
        <form action="<?= site_url('pokjamil/add') ?>" method="post">
            <div class="form-group">
                <label for="Level">Pengangkatan Menjadi * :</label>
                <input type="text" class="form-control" name="Level" id="Level" aria-describedby="helpId" value="Pokja" readonly>
            </div>
            <div class="form-group">
                <label for="Nama">Nama Pegawai <span>*</span>:</label>
                <input type="text" class="form-control" id="Nama" name="Nama" required>
            </div>
            <div class="form-group">
                <label for="NIK">NIK:</label>
                <input type="text" class="form-control" id="NIK" name="NIK" required>
            </div>
            <div class="form-group">
                <label for="NIP_Pokjamil">NIP :</label>
                <input type="text" class="form-control" id="NIP_Pokjamil" name="NIP_Pokjamil" required>
            </div>
            <div class="form-group">
                <label for="User_ID">User ID*:</label>
                <input type="text" class="form-control" id="User_ID" name="User_ID" required>
            </div>
            <div class="form-group">
                <label for="Password">Password Baru *:</label>
                <input type="text" class="form-control" id="Password" name="Password" required>
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat *:</label>
                <input type="text" class="form-control" id="Alamat" name="Alamat" required>
            </div>
            <div class="form-group">
                <label for="No_telp">No. Telepon *:</label>
                <input type="text" class="form-control" id="No_telp" name="No_telp" required>
            </div>
            <div class="form-group">
                <label for="Email">Email *:</label>
                <input type="email" class="form-control" id="Email" name="Email" required>
            </div>
            <div class="form-group">
                <label for="Pangkat">Pangkat:</label>
                <input type="text" class="form-control" id="Pangkat" name="Pangkat" required>
            </div>
            <div class="form-group">
                <label for="Jabatan">Jabatan:</label>
                <input type="text" class="form-control" id="Jabatan" name="Jabatan" required>
            </div>
            <div class="form-group">
                <label for="Golongan">Golongan:</label>
                <input type="text" class="form-control" id="Golongan" name="Golongan" required>
            </div>
            <div class="form-group">
                <label for="No_sertifikat">No. Sertifikat:</label>
                <input type="text" class="form-control" id="No_sertifikat" name="No_sertifikat" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
