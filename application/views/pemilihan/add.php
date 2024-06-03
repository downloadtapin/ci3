<div class="container">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h2>Tambah Data Pemilihan</h2>
            <form method="post" action="<?= site_url('pemilihan/add') ?>" id="formPemilihan">
                <div class="form-group">
                    <label for="Id_paket">Nama Paket Tender:</label>
                    <select class="form-control" id="Id_paket" name="Id_paket" required>
                        <option value="">
                            ----Pilih---
                        </option>
                        <?php foreach($pakets as $paket): ?>
                        <option value="<?= $paket->Id_kode_tender ?>"
                            data-no-dokumen="<?= $paket->no_dokumen_pemilihan ?>">
                            <?= $paket->Nama_tender ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="no_dokumen_pemilihan">No Dokumen Pemilihan:</label>
                    <input type="text" class="form-control" id="no_dokumen_pemilihan" name="no_dokumen_pemilihan"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="Id_penjelasan">Nomor Penjelasan:</label>
                    <select class="form-control" id="Id_penjelasan" name="Id_penjelasan" required>
                        <option value="">
                            ----Pilih---
                        </option>
                        <?php foreach($penjelasans as $penjelasan): ?>
                        <option value="<?= $penjelasan->Id_penjelasan ?>"><?= $penjelasan->No_Penjelasan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Id_evaluasi_Penawaran">No evaluasi penawaran:</label>
                    <select class="form-control" id="Id_evaluasi_Penawaran" name="Id_evaluasi_Penawaran" required>
                        <option value="">
                            ----Pilih---
                        </option>
                        <?php foreach($evaluasis as $evaluasi): ?>
                        <option value="<?= $evaluasi->Id_evaluasi_penawaran ?>"><?= $evaluasi->No_Evaluasi ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Id_pembuktian">Id_pembuktian:</label>
                    <select class="form-control" id="Id_pembuktian" name="Id_pembuktian" required>
                        <option value="">
                            ----Pilih---
                        </option>
                        <?php foreach($pembuktians as $pembuktian): ?>
                        <option value="<?= $pembuktian->Id_pembuktian ?>"><?= $pembuktian->No_Pembuktian ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Id_klarifikasi">Id_klarifikasi:</label>
                    <select class="form-control" id="Id_klarifikasi" name="Id_klarifikasi" required>
                        <option value="">
                            ----Pilih---
                        </option>
                        <?php foreach($klarifikasis as $klarifikasi): ?>
                        <option value="<?= $klarifikasi->Id_klarifikasi ?>"><?= $klarifikasi->No_Klarifikasi ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Id_negosiasi">Id_negosiasi:</label>
                    <select class="form-control" id="Id_negosiasi" name="Id_negosiasi" required>
                        <option value="">
                            ----Pilih---
                        </option>
                        <?php foreach($negosiasis as $negosiasi): ?>
                        <option value="<?= $negosiasi->Id_negosiasi ?>"><?= $negosiasi->No_Negosiasi ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="No_Pemilihan">Nomor Pemilihan:</label>
                    <input type="text" class="form-control" id="No_Pemilihan" name="No_Pemilihan" required>
                </div>
                <div class="form-group">
                    <label for="Pertanyaan_sanggah">Pertanyaan Sanggah:</label>
                    <textarea class="form-control" id="Pertanyaan_sanggah" name="Pertanyaan_sanggah"
                        required></textarea>
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
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                <a href="<?= site_url('pemilihan') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const paketSelect = document.getElementById('Id_paket');
    const noDokumenInput = document.getElementById('no_dokumen_pemilihan');

    paketSelect.addEventListener('change', function() {
        const selectedOption = paketSelect.options[paketSelect.selectedIndex];
        const noDokumen = selectedOption.getAttribute('data-no-dokumen');
        noDokumenInput.value = noDokumen;
    });

    // Trigger change event to set initial value if needed
    paketSelect.dispatchEvent(new Event('change'));
});
</script>