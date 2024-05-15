<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pokja Pemilihan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= site_url('pokjamil/add') ?>" class="btn btn-primary mb-3">Tambah PokjaMil</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>NIP</th>
                            <th>User ID</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Email</th>
                            <th>Pangkat</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>No. Sertifikat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pokjas as $pokjamil): ?>
                        <tr>
                            <td><?= $pokjamil->Level ?></td>
                            <td><?= $pokjamil->Nama ?></td>
                            <td><?= $pokjamil->NIK ?></td>
                            <td><?= $pokjamil->NIP_Pokjamil ?></td>
                            <td><?= $pokjamil->User_ID ?></td>
                            <td><?= $pokjamil->Alamat ?></td>
                            <td><?= $pokjamil->No_telp ?></td>
                            <td><?= $pokjamil->Email ?></td>
                            <td><?= $pokjamil->Pangkat ?></td>
                            <td><?= $pokjamil->Jabatan ?></td>
                            <td><?= $pokjamil->Golongan ?></td>
                            <td><?= $pokjamil->No_sertifikat ?></td>
                            <td>
                                <a href="<?= site_url('pokjamil/edit/' . $pokjamil->id) ?>" class="btn btn-primary"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="<?= site_url('pokjamil/delete/' . $pokjamil->id) ?>" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this PokjaMil?')"><i class="fa fa-trash-o" aria-hidden="true"></i>
</a>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>