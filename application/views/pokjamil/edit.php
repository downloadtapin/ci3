<div class="container">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h2>Edit PokjaMil</h2>
            <form action="<?= site_url('pokjamil/edit/' . $pokjamil->id) ?>" method="post">
                <div class="form-group">
                    <label for="Level">Pengangkatan Menjadi * :</label>
                    <input type="text" class="form-control" name="Level" id="Level" value="<?= $pokjamil->Level ?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="Nama">Nama Pegawai <span>*</span>:</label>
                    <input type="text" class="form-control" id="Nama" name="Nama" value="<?= $pokjamil->Nama ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="NIK">NIK:</label>
                    <input type="text" class="form-control" id="NIK" name="NIK" value="<?= $pokjamil->NIK ?>" required>
                </div>
                <div class="form-group">
                    <label for="NIP_Pokjamil">NIP :</label>
                    <input type="text" class="form-control" id="NIP_Pokjamil" name="NIP_Pokjamil"
                        value="<?= $pokjamil->NIP_Pokjamil ?>" required>
                </div>
                <div class="form-group">
                    <label for="User_ID">User ID*:</label>
                    <input type="text" class="form-control" id="User_ID" name="User_ID"
                        value="<?= $pokjamil->User_ID ?>" required>
                </div>
                <div class="form-group">
                    <label for="Password">Password Baru (kosongkan jika tidak ingin mengubah):</label>
                    <input type="password" class="form-control" id="Password" name="Password">
                    <input type="hidden" name="current_password" value="<?= $pokjamil->Password ?>">
                    <!-- Hidden input for current password -->
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat *:</label>
                    <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?= $pokjamil->Alamat ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="No_telp">No. Telepon *:</label>
                    <input type="text" class="form-control" id="No_telp" name="No_telp"
                        value="<?= $pokjamil->No_telp ?>" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email *:</label>
                    <input type="email" class="form-control" id="Email" name="Email" value="<?= $pokjamil->Email ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="Pangkat">Pangkat:</label>
                    <input type="text" class="form-control" id="Pangkat" name="Pangkat"
                        value="<?= $pokjamil->Pangkat ?>" required>
                </div>
                <div class="form-group">
                    <label for="Jabatan">Jabatan:</label>
                    <input type="text" class="form-control" id="Jabatan" name="Jabatan"
                        value="<?= $pokjamil->Jabatan ?>" required>
                </div>
                <div class="form-group">
                    <label for="Golongan">Golongan:</label>
                    <input type="text" class="form-control" id="Golongan" name="Golongan"
                        value="<?= $pokjamil->Golongan ?>" required>
                </div>
                <div class="form-group">
                    <label for="No_sertifikat">No. Sertifikat:</label>
                    <input type="text" class="form-control" id="No_sertifikat" name="No_sertifikat"
                        value="<?= $pokjamil->No_sertifikat ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('PokjaMil') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</div>