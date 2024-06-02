<div class="container">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h2>Edit Data Negosiasi</h2>
            <form method="post" action="<?= site_url('negosiasi/edit/'.$negosiasi->Id_negosiasi) ?>">
                <div class="form-group">
                    <label for="Id_evaluasi_penawaran">No evaluasi penawaran:</label>
                    <select class="form-control" id="Id_evaluasi_penawaran" name="Id_evaluasi_penawaran" required>
                        <?php foreach($evaluasis as $evaluasi): ?>
                        <option value="<?= $evaluasi->Id_evaluasi_penawaran ?>"
                            <?= ($evaluasi->Id_evaluasi_penawaran == $negosiasi->Id_evaluasi_penawaran) ? 'selected' : '' ?>>
                            <?= $evaluasi->No_Evaluasi ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="No_Negosiasi">Nomor Negosiasi:</label>
                    <input type="text" class="form-control" id="No_Negosiasi" name="No_Negosiasi"
                        value="<?= $negosiasi->No_Negosiasi ?>" required>
                </div>
                <div class="form-group">
                    <label for="Tanggal">Tanggal:</label>
                    <input type="date" class="form-control" id="Tanggal" name="Tanggal"
                        value="<?= $negosiasi->Tanggal ?>" required>
                </div>
                <div class="form-group">
                    <label for="harga_penawaran">Harga Penawaran:</label>
                    <input type="text" class="form-control" id="harga_penawaran" name="harga_penawaran"
                        value="<?= $negosiasi->harga_penawaran ?>" required>
                </div>harga_negosiasi
                <div class="form-group">
                    <label for="harga_terkoreksi">Harga Terkoreksi:</label>
                    <input type="text" class="form-control" id="harga_terkoreksi" name="harga_terkoreksi"
                        value="<?= $negosiasi->harga_terkoreksi ?>" required>
                </div>
                <div class="form-group">
                    <label for="harga_negosiasi">Harga negosiasi:</label>
                    <input type="text" class="form-control" id="harga_negosiasi" name="harga_negosiasi"
                        value="<?= $negosiasi->harga_negosiasi ?>" required>
                </div>
                <div class="form-group">
                    <label for="hasil_evaluasi">Hasil Evaluasi:</label>
                    <input type="text" class="form-control" id="hasil_evaluasi" name="hasil_evaluasi"
                        value="<?= $negosiasi->hasil_evaluasi ?>" required>
                </div>
                <div class="form-group">
                    <label for="Keterangan_lain">Keterangan Lain:</label>
                    <textarea class="form-control" id="Keterangan_lain"
                        name="Keterangan_lain" rows="3"><?= $negosiasi->Keterangan_lain ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                <a href="<?= site_url('negosiasi') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</div>