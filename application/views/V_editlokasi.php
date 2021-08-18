<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Lokasi Gudang : <?php echo $plg['line_gudang']; ?>
        </h1>
    </div>

    <!-- Content Row -->
    <!-- <div class="row"> -->

    <div class="col-md-5">
        <form method="POST">

            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" autocomplete="off" value="<?php echo $plg['id']; ?>">
            </div>

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Line Gudang :</label>
                <input type="text" class="form-control" id="line_gudang" name="line_gudang" autocomplete="off" value="<?php echo $plg['line_gudang']; ?>">
            </div>

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Kapasitas Pallet :</label>
                <input type="number" class="form-control" id="kapasitas_pallet" name="kapasitas_pallet" autocomplete="off" value="<?php echo $plg['kapasitas_pallet']; ?>">
            </div>

            <div class="form-group  float-right">
                <a href="<?= base_url() ?>petalokasigudang" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                &nbsp; &nbsp;
                <button type="submit" class="btn btn-primary">Proses</button>
            </div>
        </form>
    </div>
</div>

<!-- </div> -->
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->