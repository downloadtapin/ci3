<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Pemilihan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add Pemilihan</h2>
        <form method="post" action="<?= site_url('pemilihan/add') ?>">
            <div class="form-group">
                <label for="Id_negosiasi">ID Negosiasi:</label>
                <input type="text" class="form-control" id="Id_negosiasi" name="Id_negosiasi" required>
            </div>
            <div class="form-group">
                <label for="No_Pemilihan">Nomor Pemilihan:</label>
                <input type="text" class="form-control" id="No_Pemilihan" name="No_Pemilihan" required>
            </div>
            <div class="form-group">
                <label for="Pertanyaan_sanggah">Pertanyaan Sanggah:</label>
                <textarea class="form-control" id="Pertanyaan_sanggah" name="Pertanyaan_sanggah" required></textarea>
            </div>
            <div class="form-group">
                <label for="Jawaban_sanggah">Jawaban Sanggah:</label>
                <textarea class="form-control" id="Jawaban_sanggah" name="Jawaban_sanggah" required></textarea>
            </div>
            <div class="form-group">
                <label for="Tanggal">Tanggal:</label>
                <input type="date" class="form-control" id="Tanggal" name="Tanggal" required>
            </div>
            <div class="form-group">
                <label for="Cek_list">Cek List:</label>
                <input type="text" class="form-control" id="Cek_list" name="Cek_list" required>
            </div>
            <div class="form-group">
                <label for="Keterangan_lain">Keterangan Lain:</label>
                <textarea class="form-control" id="Keterangan_lain" name="Keterangan_lain"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
