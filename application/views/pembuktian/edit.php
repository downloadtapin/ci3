<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Data Pembuktian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h2>Edit Data Pembuktian</h2>
                <?php echo validation_errors(); ?>
                <form action="<?= site_url('pembuktian/edit/'.$pembuktian->Id_pembuktian) ?>" method="post">
                    <div class="form-group">
                        <label for="Id_evaluasi_penawaran">No evaluasi penawaran:</label>
                        <select class="form-control" id="Id_evaluasi_penawaran" name="Id_evaluasi_penawaran" required>
                            <option value="">Pilih Nomor Evaluasi</option>
                            <?php foreach($evaluasis as $evaluasi): ?>
                            <option value="<?= $evaluasi->Id_evaluasi_penawaran ?>"
                                <?= ($evaluasi->Id_evaluasi_penawaran == $pembuktian->Id_evaluasi_penawaran) ? 'selected' : '' ?>>
                                <?= $evaluasi->No_Evaluasi ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="No_Pembuktian">Nomor Pembuktian:</label>
                        <input type="text" class="form-control" id="No_Pembuktian" name="No_Pembuktian"
                            value="<?= $pembuktian->No_Pembuktian ?>">
                    </div>
                    <div class="form-group">
                        <label for="Tanggal">Tanggal:</label>
                        <input type="date" class="form-control" id="Tanggal" name="Tanggal"
                            value="<?= $pembuktian->Tanggal ?>">
                    </div>
                    <div class="form-group">
                        <label for="Waktu">Waktu:</label>
                        <input type="time" class="form-control" id="Waktu" name="Waktu"
                            value="<?= substr($pembuktian->Waktu, 0, 5) ?>">
                    </div>
                    <div class="form-group">
                        <label for="Tempat">Tempat:</label>
                        <textarea class="form-control" id="Tempat" name="Tempat" required
                            rows="3"><?= $pembuktian->Tempat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Nama_penyedia">Nama Penyedia:</label>
                        <input type="text" class="form-control" id="Nama_penyedia" name="Nama_penyedia" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat:</label>
                        <textarea class="form-control" id="Alamat" name="Alamat" required
                            rows="3"><?= $pembuktian->Alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Nama_hadir">Nama Hadir:</label>
                        <input type="text" class="form-control" id="Nama_hadir" name="Nama_hadir"
                            value="<?= $pembuktian->Nama_hadir ?>">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan :</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $pembuktian->jabatan ?>">
                    </div>
                    <div class="form-group">
                        <label for="Keterangan_lain">Keterangan Lain:</label>
                        <textarea class="form-control" id="Keterangan_lain" name="Keterangan_lain"
                            rows="3"><?= $pembuktian->Keterangan_lain ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <a href="<?= site_url('pembuktian') ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        function loadNamaPenyedia(id) {
            if (id) {
                $.ajax({
                    url: '<?= site_url('pembuktian/get_nama_penyedia') ?>',
                    type: 'POST',
                    data: {
                        Id_evaluasi_penawaran: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            $('#Nama_penyedia').val(data.nama_Penyedia);
                        } else {
                            $('#Nama_penyedia').val('');
                        }
                    }
                });
            } else {
                $('#Nama_penyedia').val('');
            }
        }

        // Load Nama Penyedia when No Evaluasi is changed
        $('#Id_evaluasi_penawaran').change(function() {
            var id = $(this).val();
            loadNamaPenyedia(id);
        });

        // Load Nama Penyedia on page load
        var initialId = $('#Id_evaluasi_penawaran').val();
        loadNamaPenyedia(initialId);
    });
    </script>
</body>

</html>