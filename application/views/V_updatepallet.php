<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pallet ID : <?= $this->input->post('id_pallet'); ?></h1>

    </div>
    <p style="color: red;">*Silahkan isi sesuai kebutuhan</p>
    <!-- Content Row -->
    <!-- <div class="row"> -->

    <div class="col-md-5">
        <form method="POST" action="<?= base_url() ?>fifo/updatepallet">
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_pallet" name="id_pallet" autocomplete="off" value="<?= $this->input->post('id_pallet'); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Qty :</label>
                <input type="number" class="form-control" id="qty" name="qty" value="<?= $detail['qty']; ?>" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Lokasi Gudang :</label>
                <input type="text" class="form-control" id="lokasi_gudang" name="lokasi_gudang" autocomplete="off" value="<?= $detail['lokasi_gudang']; ?>" required>
            </div>

            <div class="form-group  float-right">
                <a href="<?= base_url() ?>fifo/scan_updatepallet" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                &nbsp; &nbsp;
                <button type="submit" class="btn btn-primary">Pindahkan</button>
            </div>
        </form>
    </div>
</div>

<!-- </div> -->
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->