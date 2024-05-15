<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Klarifikasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Add Klarifikasi</h2>
        <?php echo validation_errors(); ?>
        <form action="<?= site_url('klarifikasi/add') ?>" method="post">
            <div class="form-group">
                <label for="Id_evaluasi_penawaran">ID Kode Tender:</label>
                <select class="form-control" id="Id_evaluasi_penawaran" name="Id_evaluasi_penawaran" required>
                    <?php foreach($evaluasis as $evaluasi): ?>
                    <option value="<?= $evaluasi->Id_evaluasi_penawaran ?>"><?= $evaluasi->No_Evaluasi ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="No_Klarifikasi">Nomor Klarifikasi</label>
                <input type="text" class="form-control" id="No_Klarifikasi" name="No_Klarifikasi" required>
            </div>
            <div class="form-group">
                <label for="Peralatan">Peralatan</label>
                <input type="text" class="form-control" id="Peralatan" name="Peralatan" required>
            </div>
            <div class="form-group">
                <label for="Tenaga_ahli">Tenaga Ahli</label>
                <input type="text" class="form-control" id="Tenaga_ahli" name="Tenaga_ahli" required>
            </div>
            <div class="form-group">
                <label for="Keterangan_lain">Keterangan Lain</label>
                <textarea class="form-control" id="Keterangan_lain" name="Keterangan_lain" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>