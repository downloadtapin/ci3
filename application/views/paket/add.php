
    <div class="container">
        <h2>Tambah Paket Tender</h2>
        <form action="<?= site_url('paket/add') ?>" method="post">
            <div class="form-group">
                <label for="Id_kode_tender">ID Kode Tender:</label>
                <input type="text" class="form-control" id="Id_kode_tender" name="Id_kode_tender" required>
            </div>
            <div class="form-group">
            <label for="Id_pokja">Nama Pokja:</label>
            <select class="form-control" id="Id_pokja" name="Id_pokja[]" required multiple aria-label="multiple select example">
                <?php foreach ($pokjas as $pokja) : ?>
                    <option value="<?php echo $pokja->id; ?>"><?php echo $pokja->Nama; ?></option>
                <?php endforeach; ?>
            </select>

            </div>
            <div class="form-group">
                <label for="Nama_tender">Nama Tender:</label>
                <input type="text" class="form-control" id="Nama_tender" name="Nama_tender" required>
            </div>
            <div class="form-group">
                <label for="Nilai_Pagu">Nilai Pagu:</label>
                <input type="text" class="form-control" id="Nilai_Pagu" name="Nilai_Pagu" required>
            </div>
            <div class="form-group">
                <label for="Kode_RUP">Kode RUP:</label>
                <input type="text" class="form-control" id="Kode_RUP" name="Kode_RUP" required>
            </div>
            <div class="form-group">
                <label for="Nilai_HPS">Nilai HPS:</label>
                <input type="text" class="form-control" id="Nilai_HPS" name="Nilai_HPS" required>
            </div>
            <div class="form-group">
                <label for="Kode_anggaran">Kode Anggaran:</label>
                <input type="text" class="form-control" id="Kode_anggaran" name="Kode_anggaran" required>
            </div>
            <div class="form-group">
                <label for="Metode_tender">Metode Tender:</label>
                <input type="text" class="form-control" id="Metode_tender" name="Metode_tender" required>
            </div>
            <div class="form-group">
                <label for="Nama_PPK">Nama PPK:</label>
                <input type="text" class="form-control" id="Nama_PPK" name="Nama_PPK" required>
            </div>
            <div class="form-group">
                <label for="NIP_PPK">NIP PPK:</label>
                <input type="text" class="form-control" id="NIP_PPK" name="NIP_PPK" required>
            </div>
            <div class="form-group">
                <label for="No_SK">No. SK:</label>
                <input type="text" class="form-control" id="No_SK" name="No_SK" required>
            </div>
            <div class="form-group">
                <label for="Unit_kerja">Unit Kerja:</label>
                <input type="text" class="form-control" id="Unit_kerja" name="Unit_kerja" required>
            </div>
            <div class="form-group">
                <label for="Tgl_permohonan">Tanggal Permohonan:</label>
                <input type="text" class="form-control datepicker" id="Tgl_permohonan" name="Tgl_permohonan" required>
            </div>
            <div class="form-group">
                <label for="Tgl_penugasan">Tanggal Penugasan:</label>
                <input type="text" class="form-control datepicker" id="Tgl_penugasan" name="Tgl_penugasan" required>
            </div>
            <div class="form-group">
                <label for="Pokja_pemilihan">Pokja Pemilihan:</label>
                <input type="text" class="form-control" id="Pokja_pemilihan" name="Pokja_pemilihan" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?= site_url('paket') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
</body>
</html>
