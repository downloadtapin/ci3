<div class="container">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h2>Tambah Data Evaluasi</h2>
            <form action="<?= site_url('evaluasi/add') ?>" method="post">
                <div class="form-group">
                    <label for="Id_kode_tender">Nama Paket Tender:</label>
                    <select class="form-control" id="Id_kode_tender" name="Id_kode_tender" required>
                        <?php foreach($pakets as $paket): ?>
                        <option value="<?= $paket->Id_kode_tender ?>"><?= $paket->Nama_tender ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="No_Evaluasi">Nomor Evaluasi</label>
                    <input type="text" class="form-control" id="No_Evaluasi" name="No_Evaluasi" required>
                </div>
                <div class="form-group">
                    <label for="Tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="Tanggal" name="Tanggal" required>
                </div>
                <div class="form-group">
                    <label for="Metode_evaluasi">Metode Evaluasi</label>
                    <input type="text" class="form-control" id="Metode_evaluasi" name="Metode_evaluasi" required>
                </div>
                <div class="form-group">
                    <label for="nama_Penyedia">Nama Penyedia</label>
                    <input type="text" class="form-control" id="nama_Penyedia" name="nama_Penyedia" required>
                </div>
                <div class="form-group">
                    <label for="nilai_penawaran">Nilai Penawaran</label>
                    <input type="number" class="form-control" id="nilai_penawaran" name="nilai_penawaran" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="kualifikasi" name="kualifikasi" value="1">
                    <label class="form-check-label" for="kualifikasi">Kualifikasi</label>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="administrasi" name="administrasi" value="1">
                    <label class="form-check-label" for="administrasi">Administrasi</label>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="teknis" name="teknis" value="1">
                    <label class="form-check-label" for="teknis">Teknis</label>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="harga" name="harga" value="1">
                    <label class="form-check-label" for="harga">Harga</label>
                </div>
                <div class="form-group">
                    <label for="Keterangan_lain">Keterangan Lain</label>
                    <input type="text" class="form-control" id="Keterangan_lain" name="Keterangan_lain">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('evaluasi') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</div>