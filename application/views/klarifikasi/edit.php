<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Klarifikasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Klarifikasi</h2>
        <?php echo validation_errors(); ?>
        <form action="<?= site_url('klarifikasi/edit/'.$klarifikasi->Id_klarifikasi) ?>" method="post">
            <div class="form-group">
                <label for="Id_pembuktian">ID Pembuktian</label>
                <input type="text" class="form-control" id="Id_pembuktian" name="Id_pembuktian" value="<?= $klarifikasi->Id_pembuktian ?>" required>
            </div>
            <div class="form-group">
                <label for="No_Klarifikasi">Nomor Klarifikasi</label>
                <input type="text" class="form-control" id="No_Klarifikasi" name="No_Klarifikasi" value="<?= $klarifikasi->No_Klarifikasi ?>" required>
            </div>
            <div class="form-group">
                <label for="Peralatan">Peralatan</label>
                <input type="text" class="form-control" id="Peralatan" name="Peralatan" value="<?= $klarifikasi->Peralatan ?>" required>
            </div>
            <div class="form-group">
                <label for="Tenaga_ahli">Tenaga Ahli</label>
                <input type="text" class="form-control" id="Tenaga_ahli" name="Tenaga_ahli" value="<?= $klarifikasi->Tenaga_ahli ?>" required>
            </div>
            <div class="form-group">
                <label for="Keterangan_lain">Keterangan Lain</label>
                <textarea class="form-control" id="Keterangan_lain" name="Keterangan_lain" rows="3"><?= $klarifikasi->Keterangan_lain ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
