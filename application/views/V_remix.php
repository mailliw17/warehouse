<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Scan Pallet yang akan di BLOCK</h1>
    </div>

    <!-- Content Row -->
    <!-- <div class="row"> -->

    <div class="">
        <form method="POST" action="<?= base_url() ?>lab/store_remix">
            <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">ID Pallet :</label>
                <input type="text" class="form-control" id="id_pallet" name="id_pallet" autocomplete="off" required autofocus>
            </div>
            <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Qty Remix :</label>
                <input type="number" class="form-control" id="qty" name="qty" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-success">OK</button>
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