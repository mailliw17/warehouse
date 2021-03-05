<!-- Begin Page Content -->
<div class="container-fluid tampil">

    <!-- <div align="center">
        <div id='ajax-wait'>
            <img alt='loading...' src='<?php echo base_url() ?>/assets/img/loading.png' />
        </div>
    </div> -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Aksi untuk Tambah, Hapus, dan Edit Pallet</h1>
        <!-- <button href="<?= base_url() ?>C_qrcode/tambahqrcode" data-toggle="modal" data-target="#QRModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Buat QR CODE BARU</button> -->
    </div>

    <div style="margin-bottom: 10px;">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#fifoModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Masukkan Nomor DO</span>
            </a>
        </h6>
    </div>

    <hr>

    <h3>Pallet yang sedang diambil oleh forklift : </h3>
    <div class="row">
        <?php foreach ($checker as $c) : ?>

            <div class="col-lg-3">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Nomor DO : <?php echo $c['nomor_do']; ?> </h6>
                    </div>
                    <div class="card-body">
                        Kode Pakan : <?php echo $c['kode_pakan']; ?>
                        <br>
                        Qty : <?php echo $c['qty_checker']; ?> Bag
                        <br>
                        Lokasi Gudang : <?php echo $c['lokasi_gudang']; ?>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>

    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Masukkan nomor DO -->
<div class="modal fade" id="fifoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukkan Nomor DO Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>fifo/before_checker/">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nomor DO :</label>
                        <input type="number" class="form-control" id="nomor_do" name="nomor_do" autocomplete="off" required>
                        <?= form_error('nomor_do', ' <small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>