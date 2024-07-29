<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Content Row -->
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Paket Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $paket_count ?> Paket</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Pagu Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                <?= number_format($total_pagu, 2, ',', '.') ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total HPS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                <?= number_format($total_hps, 2, ',', '.') ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card" style="width: 100%;">
            <div class="card-body shadow border py-2 mb-4">
                <div class="table-responsive">
                <h3>Daftar Paket Masuk</h3>
                    <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tender</th>
                                <th>Nilai Pagu</th>
                                <th>Nilai HPS</th>
                                <th>Metode Tender</th>
                                <th style="width: 20%;">Nama PPK</th>
                                <th>Tanggal Penugasan</th>
                                <th>Pokja Pemilihan</th>
                                <th style="width: 30%;">Nama Pokja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
        $no = 1; // Variabel penghitung untuk nomor urut
        foreach ($pakets as $paket): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $paket->Nama_tender ?></td>

                                <td><?= $paket->Nilai_Pagu ?></td>
                                <td><?= $paket->Nilai_HPS ?></td>
                                <td><?= $paket->Metode_tender ?></td>
                                <td><?= $paket->Nama_PPK ?></td>
                                <td><?= $paket->Tgl_penugasan ?></td>
                                <td><?= $paket->Pokja_pemilihan ?></td>
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
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card" style="width: 100%;">
            <div class="card-body shadow border ">
                <div class="table-responsive">
                    <h3>Jumlah Paket Per Pokja Pemilihan</h3>
                    <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Pokja</th>
                                <th>Jumlah Paket</th>
                                <th>Total Nilai Pagu</th>
                                <th>Total Nilai HPS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($paket_summary as $summary): ?>
                            <tr>
                                <td><?= $summary->Nama ?></td>
                                <td><?= $summary->total_paket ?></td>
                                <td><?= number_format($summary->total_pagu, 0, ',', '.') ?></td>
                                <td><?= number_format($summary->total_hps, 0, ',', '.') ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->

            <!-- Color System -->


        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->


        </div>
    </div>
</div>
</div>
<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->session->flashdata('success'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('success')): ?>
            $('#successModal').modal('show');
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            $('#errorModal').modal('show');
        <?php endif; ?>
    });
</script>