<div class="container">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h2>Edit Data Klarifikasi</h2>
            <?php echo validation_errors(); ?>
            <form action="<?= site_url('klarifikasi/edit/'.$klarifikasi->Id_klarifikasi) ?>" method="post">
                <div class="form-group">
                    <label for="Id_evaluasi_penawaran">No evaluasi penawaran:</label>
                    <select class="form-control" id="Id_evaluasi_penawaran" name="Id_evaluasi_penawaran" required>
                        <?php foreach($evaluasis as $evaluasi): ?>
                        <option value="<?= $evaluasi->Id_evaluasi_penawaran ?>"
                            <?= ($evaluasi->Id_evaluasi_penawaran == $evaluasi->Id_evaluasi_penawaran) ? 'selected' : '' ?>>
                            <?= $evaluasi->No_Evaluasi ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="No_Klarifikasi">Nomor Klarifikasi</label>
                    <input type="text" class="form-control" id="No_Klarifikasi" name="No_Klarifikasi"
                        value="<?= $klarifikasi->No_Klarifikasi ?>" required>
                </div>
                <div class="form-group">
                    <label for="Peralatan">Peralatan</label>
                    <input type="text" class="form-control" id="Peralatan" name="Peralatan"
                        value="<?= $klarifikasi->Peralatan ?>" required>
                </div>
                <div class="form-group">
                    <label for="Tenaga_ahli">Tenaga Ahli</label>
                    <input type="text" class="form-control" id="Tenaga_ahli" name="Tenaga_ahli"
                        value="<?= $klarifikasi->Tenaga_ahli ?>" required>
                </div>
                <div class="form-group">
                    <label for="Keterangan_lain">Keterangan Lain</label>
                    <textarea class="form-control" id="Keterangan_lain" name="Keterangan_lain"
                        rows="3"><?= $klarifikasi->Keterangan_lain ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                <a href="<?= site_url('klarifikasi') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</div>