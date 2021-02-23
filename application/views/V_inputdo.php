<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Masukan Nomor DO Sebelum Muat</h1>
    </div>

    <!-- Content Row -->
    <!-- <div class="row"> -->

    <div class="col-md-5">
        <form method="POST" action="<?= base_url('inputdo/before_lastcheck/') ?>">
            <div class="form-group ">
                <label for="recipient-name" class="col-form-label">Nomor DO :</label>
                <input list="nomor_do_dropdown" class="form-control name_list" id="nomor_do" name="nomor_do" autocomplete="off" required autofocus>
                <datalist id="nomor_do_dropdown">
                    <?php
                    foreach ($nomor_do as $do) : ?>
                        <option value="<?= $do->nomor_do ?>"></option>
                    <?php endforeach; ?>
                </datalist>
                <?= form_error('nomor_do', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>

            <!-- <div class="form-group ">
                <label for="recipient-name" class="col-form-label">Pelanggan : </label>
                <input list="nama_pelanggan_dropdown" class="form-control name_list" id="nama_pelanggan" name="nama_pelanggan" autocomplete="off" required>
                <datalist id="nama_pelanggan_dropdown">
                    <?php
                    foreach ($pelanggan as $p) : ?>
                        <option value="<?= $p->nama_pelanggan ?>"></option>
                    <?php endforeach; ?>
                </datalist>
                <?= form_error('nama_pelanggan', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div> -->

            <!-- <div class="form-group ">
                <label for="recipient-name" class="col-form-label">Plat Nomor : </label>
                <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" autocomplete="off" required>
                <?= form_error('plat_nomor', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div> -->

            <div class="form-group  float-right">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                &nbsp; &nbsp;
                <button type="submit" class="btn btn-primary">Lanjut</button>
            </div>
        </form>
    </div>
</div>

<!-- </div> -->
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<script src="<?= base_url() ?>vendor/sweetalert.js"></script>

<?php if ($this->session->flashdata('nomordo_gaada')) : ?>
    <script>
        Swal.fire(
            'Error',
            'Nomor DO tidak ditemukan. Silahkan cetak form FIFO',
            'warning'
        )
    </script>
<?php endif; ?>