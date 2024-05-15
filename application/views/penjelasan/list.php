<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Penjelasan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= site_url('penjelasan/add') ?>" class="btn btn-primary mb-3">Tambah Penjelasan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Tender</th>
                            <th>No. Penjelasan</th>
                            <th>Tanggal</th>
                            <th>Nama Penyedia</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Keterangan Lain</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penjelasans as $penjelasan): ?>
                        <tr>
                            <td>
                                <?php 
                        foreach ($pakets as $paket) {
                            if ($paket->Id_kode_tender == $penjelasan->Id_kode_tender) {
                                echo $paket->Nama_tender;
                                break;
                            }
                        }
                        ?>
                            </td>
                            <td><?= $penjelasan->No_Penjelasan ?></td>
                            <td><?= $penjelasan->Tanggal ?></td>
                            <td><?= $penjelasan->Nama_penyedia ?></td>
                            <td><?= $penjelasan->Pertanyaan ?></td>
                            <td><?= $penjelasan->Jawaban ?></td>
                            <td><?= $penjelasan->Keterangan_lain ?></td>
                            <td>
                                <a href="<?= site_url('penjelasan/edit/'.$penjelasan->Id_penjelasan) ?>"
                                    class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <a href="<?= site_url('penjelasan/delete/'.$penjelasan->Id_penjelasan) ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this penjelasan?')"><i
                                        class="bi bi-trash"></i></a>
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