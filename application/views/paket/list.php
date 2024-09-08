<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Paket</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= site_url('paket/add') ?>" class="btn btn-primary mb-3">Add Paket</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pokja</th>
                            <th>Nama Tender</th>
                            <th>Nilai Pagu</th>
                            <th>Kode RUP</th>
                            <th>Nilai HPS</th>
                            <th>Kode Anggaran</th>
                            <th>Metode Tender</th>
                            <th>Nama PPK</th>
                            <th>Tanggal Penugasan</th>
                            <th>Pokja Pemilihan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pakets as $paket): ?>
                        <tr>
                            <td>
                                <?php
                            // Pecah string ID Pokja menjadi array
                            $selected_ids = explode(',', $paket->Id_pokja);
                            
                            // Inisialisasi array untuk menyimpan nama-nama pokja
                            $pokja_names = array();

                            // Ambil nama-nama pokja sesuai dengan ID yang dipilih
                            foreach ($selected_ids as $selected_id) {
                                foreach ($pokjas as $pokja) {
                                    if ($pokja->id == $selected_id) {
                                        $pokja_names[] = $pokja->Nama;
                                        break;
                                    }
                                }
                            }

                            // Tampilkan nama-nama pokja yang dipilih, dipisahkan dengan koma
                            echo implode(', ', $pokja_names);
                        ?>
                            </td>
                            <td><?= $paket->Nama_tender ?></td>
                            <td><?= $paket->Nilai_Pagu ?></td>
                            <td><?= $paket->Kode_RUP ?></td>
                            <td><?= $paket->Nilai_HPS ?></td>
                            <td><?= $paket->Kode_anggaran ?></td>
                            <td><?= $paket->Metode_tender ?></td>
                            <td><?= $paket->Nama_PPK ?></td>
                            <td><?= $paket->Tgl_penugasan ?></td>
                            <td><?= $paket->Pokja_pemilihan ?></td>
                            <td>
                                <?php if (!in_array($paket->Id_kode_tender, $inputted_pakets2)): ?>
                                <a href="<?= site_url('paket/edit/'.$paket->Id_kode_tender) ?>"
                                    class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>


                                <?php elseif (!in_array($paket->Id_kode_tender, $inputted_pakets)): ?>
                                <a href="<?= site_url('paket/edit/'.$paket->Id_kode_tender) ?>"
                                    class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <?php endif; ?>


                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>