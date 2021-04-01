<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Scan Barcode Untuk perbaruan Lokasi/Qty Pallet </h1>
    </div>

    <!-- Content Row -->
    <!-- <div class="row"> -->

    <?php if ($this->session->flashdata('berhasil')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Pallet berhasil diperbarui !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="">
        <form method="POST" action="<?= base_url() ?>fifo/form_updatepallet">
            <div class="form-group col-md-4">
                <label for="recipient-name" class="col-form-label">ID Pallet :</label>
                <input type="text" class="form-control" id="id_pallet" name="id_pallet" autocomplete="off" required autofocus>
            </div>
            <button type="submit">oke</button>
        </form>
    </div>
</div>

<!-- </div> -->
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<script src="<?= base_url() ?>vendor/sweetalert.js"></script>

<?php if ($this->session->flashdata('gagal_barcode')) : ?>
    <script>
        Swal.fire(
            'Gagal',
            'Barcode Tidak Terdaftar!',
            'error'
        )
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('pallet_kosong')) : ?>
    <script>
        Swal.fire(
            'Gagal',
            'Pallet masih kosong, tidak bisa diperbarui !',
            'error'
        )
    </script>
<?php endif; ?>