<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Block Feed</h1>
    </div>

    <!-- flashdata kalau berhasil nambah -->
    <?php if ($this->session->flashdata('blockfeed')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Pallet berhasil di BLOCK !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('riliskembali_berhasil')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Pallet berhasil di RILIS KEMBALI !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('remix')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Pallet berhasil di REMIX !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('remix_gagal')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Gagal, Pallet sudah di REMIX sebelumnya !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>


    <?php if ($this->session->flashdata('remix_gagal_karena_blocked')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Gagal, Pallet sedang di BLOCKED !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('riliskembali_gagal_no_block')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Gagal, Pallet tidak di BLOCKED !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Content Row -->
    <!-- <div class="row"> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= base_url() ?>lab/blockfeed" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-ban"></i>
                    </span>
                    <span class="text">Block Feed</span>
                </a>
                <a href="<?= base_url() ?>lab/riliskembali" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Rilis Kembali</span>
                </a>
                <a href="<?= base_url() ?>lab/remix" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-mortar-pestle"></i>
                    </span>
                    <span class="text">Remix</span>
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Kode Pakan</th>
                            <th>Tanggal Produksi</th>
                            <th>Lokasi</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Qty</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($block as $b) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $b['kode_pakan'] ?> </td>
                                <td> <?php echo date("d-M-Y", strtotime($b['waktu_pembuatan'])) ?></td>
                                <td> <?php echo $b['lokasi_gudang'] ?> </td>
                                <td><?php echo date("d-M-Y", strtotime($b['expired_date'])) ?> </td>
                                <td> <?php if ($b['status_lab'] == 'BLOCKED') {
                                            echo $b['qty'];
                                        } else if ($b['status_lab'] == 'REMIXED') {
                                            echo $b['qty_remix'];;
                                        }  ?> </td>
                                <td><?php if ($b['status_lab'] == 'BLOCKED') {
                                        echo '<span class="badge badge-danger">BLOCKED</span>';
                                    }  ?></td>

                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- </div> -->
<!-- /.container-fluid -->

<!-- BAGIAN REMIX -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Remix Area</h1>
    </div>

    <!-- Content Row -->
    <!-- <div class="row"> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Kode Pakan</th>
                            <th>Tanggal Produksi</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($remix as $r) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $r['kode_pakan'] ?> </td>
                                <td> <?php echo date("d-M-Y", strtotime($r['waktu_pembuatan'])) ?></td>
                                <td><?php echo date("d-M-Y", strtotime($r['expired_date'])) ?> </td>
                                <td> <?php echo $r['qty_remix']; ?> </td>
                                <td>
                                    <a onclick="javacript:return confirm('Pakan benar sudah di repacking?')" href="<?php echo base_url('lab/repackingdone/') . $r['id_pallet'] ?>" class=" btn btn-success btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-clipboard-check"></i>
                                        </span>
                                        <span class="text">REMIXED</span>

                                    </a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->