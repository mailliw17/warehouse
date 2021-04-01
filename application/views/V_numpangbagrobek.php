<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Scan KodeQR Pallet yang akan ditumpangi <br>

            <center> <strong> <?php echo $bag['qty_rpk']; ?> Bag Repack <?php echo $bag['kode_pakan']; ?> </strong></center>

        </h1>
    </div>
    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            <h4>Persyaratan Repacking :</h4>
            <ol>
                <li>Pallet <strong>harus berisi</strong>, tidak boleh pallet baru</li>
                <li>Kode pakan antara Bag Pallet dan Bag Repacking <strong>harus sama</strong> </li>
                <li>Pallet yang di barcode adalah pallet yang terdaftar di sistem</li>
            </ol>
        </div>
    </div>

    <!-- Content Row -->
    <!-- <div class="row"> -->

    <div class="col-md-5">
        <form method="POST" action="<?= base_url() ?>gudangrpk/pindahkepallet">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">ID Pallet :</label>
                <input type="text" class="form-control" id="id_pallet" name="id_pallet" autocomplete="off" placeholder="Klik dan scan kodeQR disini" required autofocus>
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" id="id_pallet_rpk" name="id_pallet_rpk" autocomplete="off" value="<?php echo $bag['id_pallet']; ?>">
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" id="qty_rpk" name="qty_rpk" autocomplete="off" value="<?php echo $bag['qty_rpk']; ?>">
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" id="kode_pakan" name="kode_pakan" autocomplete="off" value="<?php echo $bag['kode_pakan']; ?>">
            </div>

            <div class="form-group  float-right">
                <a href="<?= base_url() ?>gudangrpk" class="btn btn-secondary" data-dismiss="modal">Batal</a>
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