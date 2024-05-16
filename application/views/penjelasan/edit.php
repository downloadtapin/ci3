<div class="container">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h2>Edit Penjelasan</h2>
            <?php if(validation_errors()): ?>
            <div class="alert alert-danger"><?= validation_errors() ?></div>
            <?php endif; ?>
            <form action="<?= site_url('penjelasan/edit/'.$penjelasan->Id_penjelasan) ?>" method="post">
                <div class="form-group">
                    <label for="Id_kode_tender">ID Kode Tender:</label>
                    <select class="form-control" id="Id_kode_tender" name="Id_kode_tender" required>
                        <?php foreach($pakets as $paket): ?>
                        <option value="<?= $paket->Id_kode_tender ?>"
                            <?= ($paket->Id_kode_tender == $penjelasan->Id_kode_tender) ? 'selected' : '' ?>>
                            <?= $paket->Nama_tender ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="No_Penjelasan">Nomor Penjelasan:</label>
                    <input type="text" class="form-control" id="No_Penjelasan" name="No_Penjelasan"
                        value="<?= $penjelasan->No_Penjelasan ?>" required>
                </div>
                <div class="form-group">
                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" class="form-control datepicker" id="Tanggal" name="Tanggal"
                        value="<?= $penjelasan->Tanggal ?>" required>
                </div>
                <div class="form-group">
                    <label for="Nama_penyedia">Nama Penyedia:</label>
                    <input type="text" class="form-control" id="Nama_penyedia" name="Nama_penyedia"
                        value="<?= $penjelasan->Nama_penyedia ?>" required>
                </div>
                <div class="form-group">
                    <label for="Pertanyaan">Pertanyaan:</label>
                    <input type="text" class="form-control" id="Pertanyaan" name="Pertanyaan"
                        value="<?= $penjelasan->Pertanyaan ?>" required>
                </div>
                <div class="form-group">
                    <label for="Jawaban">Jawaban:</label>
                    <input type="text" class="form-control" id="Jawaban" name="Jawaban"
                        value="<?= $penjelasan->Jawaban ?>" required>
                </div>
                <div class="form-group">
                    <label for="Keterangan_lain">Keterangan Lain:</label>
                    <input type="text" class="form-control" id="Keterangan_lain" name="Keterangan_lain"
                        value="<?= $penjelasan->Keterangan_lain ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('penjelasan') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</div>