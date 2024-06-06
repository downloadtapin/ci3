<div class="container">
    <div class="card shadow mb-4">
        <script>
        $(document).ready(function() {
            $(".format-number").keyup(function() {
                var value = $(this).val().replace(/[^\d,\.]/g, '');
                var parts = value.split(',');
                var integerPart = parts[0].replace(/\D+/g, '');
                var fractionalPart = parts.length > 1 ? ',' + parts[1] : '';

                var result = '';

                for (var i = integerPart.length - 1; i >= 0; i--) {
                    if ((integerPart.length - i) % 3 === 0 && i !== integerPart.length - 1) {
                        result = '.' + result;
                    }
                    result = integerPart[i] + result;
                }

                $(this).val(result + fractionalPart);
            });
        });
        </script>
        <div class="card-body">
            <h2>Tambah Data Negosiasi</h2>
            <form method="post" action="<?= site_url('negosiasi/add') ?>">
                <div class="form-group">
                    <label for="Id_evaluasi_penawaran">Nomor Evaluasi Penawaran:</label>
                    <select class="form-control" id="Id_evaluasi_penawaran" name="Id_evaluasi_penawaran" required>
                        <?php foreach($evaluasis as $evaluasi): ?>
                        <option value="<?= $evaluasi->Id_evaluasi_penawaran ?>"><?= $evaluasi->No_Evaluasi ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="No_Negosiasi">Nomor Negosiasi:</label>
                    <input type="text" class="form-control" id="No_Negosiasi" name="No_Negosiasi" required>
                </div>
                <div class="form-group">
                    <label for="Tanggal">Tanggal:</label>
                    <input type="date" class="form-control" id="Tanggal" name="Tanggal" required>
                </div>
                <div class="form-group">
                    <label for="harga_penawaran">Harga Penawaran:</label>
                    <input type="text" class="form-control format-number" id="harga_penawaran" name="harga_penawaran"
                        required>
                </div>
                <div class="form-group">
                    <label for="harga_terkoreksi">Harga Terkoreksi:</label>
                    <input type="text" class="form-control format-number" id="harga_terkoreksi" name="harga_terkoreksi"
                        required>
                </div>
                <div class="form-group">
                    <label for="harga_negosiasi">Harga Negosiasi:</label>
                    <input type="text" class="form-control format-number" id="harga_negosiasi" name="harga_negosiasi"
                        required>
                </div>

                <div class="form-group">
                    <label for="hasil_evaluasi">Hasil Evaluasi:</label>
                    <input type="text" class="form-control format-number" id="hasil_evaluasi" name="hasil_evaluasi"
                        required>
                </div>
                <div class="form-group">
                    <label for="Keterangan_lain">Keterangan Lain:</label>
                    <textarea class="form-control" id="Keterangan_lain" name="Keterangan_lain" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                <a href="<?= site_url('negosiasi') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</div>