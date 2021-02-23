<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Scan Barcode menggunakan Hand Held</h1>
    </div>

    <?php if ($this->session->flashdata('gagal')) : ?>
        <!-- <h3 class="panel-title">Arahkan Kode QR Ke Kamera!</h3> -->
        <audio controls autoplay hidden>
            <source src="<?= base_url() ?>assets/gagal.mp3" type="audio/mpeg">
        </audio>
    <?php endif; ?>

    <!-- Content Row -->
    <!-- <div class="row"> -->

    <div class="">
        <form method="POST" action="<?= base_url() ?>inputpo/input_po_handheld">
            <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">ID Pallet :</label>
                <input type="text" class="form-control" id="id_pallet" name="id_pallet" autocomplete="off" required autofocus>
            </div>
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