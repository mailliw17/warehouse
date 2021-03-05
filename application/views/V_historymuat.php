<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">History Muat Bag Ke Truk</h1>
    </div>

    <?php if ($this->session->flashdata('berhasil-do')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Input DO ke dalam sistem berhasil !
            Silahkan cetak perincian muat !
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
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nomor DO</th>
                            <th>Pelanggan</th>
                            <th>Plat Nomor</th>
                            <!-- <th>Qty</th> -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($history as $h) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $h['nomor_do']; ?> </td>
                                <td> <?php echo $h['nama_pelanggan'] ?> </td>
                                <td> <?php echo $h['plat_nomor'] ?> </td>
                                <!-- <td> <?php echo $h['qty'] ?> Bag </td> -->
                                <td>

                                    <a href="<?php echo base_url('cetak/printpelanggan/') . $h['nomor_do'] ?>" target="_blank" class=" btn btn-info btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-print"></i>
                                        </span>
                                        <span class="text">Cetak Bukti</span>

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

<!-- </div> -->
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->