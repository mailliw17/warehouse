<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Scan KodeQR Pallet yang akan ditumbangi Bag Robek</h1>
    </div>

    <?php if ($this->session->flashdata('gagal')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Pallet masih kosong, silahkan masukan Bag ke pallet yang sudah berisi !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Content Row -->
    <!-- <div class="row"> -->

    <div class="col-md-5">
        <form method="POST" action="<?= base_url() ?>palletrobek/tambah">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">ID Pallet :</label>
                <input type="text" class="form-control" id="id_pallet" name="id_pallet" autocomplete="off" placeholder="Klik dan scan kodeQR disini" required autofocus>
            </div>

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Qty :</label>
                <input type="number" class="form-control" id="qty" name="qty" autocomplete="off" required>
            </div>

            <div class="form-group  float-right">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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