<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Info ScanQR Pallet</h1>
        <!-- <button href="<?= base_url() ?>C_qrcode/tambahqrcode" data-toggle="modal" data-target="#QRModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Buat QR CODE BARU</button> -->
    </div>

    <!-- <table class="table table-striped">
        <thead>
        </thead>
        <tbody>
            <tr>
                <th scope="row">ID Pallet</th>
                <td>Mark</td>
            </tr>
            <tr>
                <th scope="row">Nomor PO</th>
                <td>Jacob</td>
            </tr>
            <tr>
                <th scope="row">Kode Pakan</th>
                <td>Larry</td>
            </tr>
            <tr>
                <th scope="row">Nomor Pallet</th>
                <td>Larry</td>
            </tr>
            <tr>
                <th scope="row">Line Packing</th>
                <td>Larry</td>
            </tr>
            <tr>
                <th scope="row">Lokasi Gudang</th>
                <td>Larry</td>
            </tr>
            <tr>
                <th scope="row">Waktu Pembuatan</th>
                <td>Larry</td>
            </tr>
            <tr>
                <th scope="row">Shift</th>
                <td>Larry</td>
            </tr>
            <tr>
                <th scope="row">Expired Date</th>
                <td>Larry</td>
            </tr>
        </tbody>
    </table> -->

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> <strong>Pallet ID <?php echo $detail['id_pallet']; ?> </strong> </h5>
                    <hr>
                    <p class="card-text">Nomor PO : <?php echo $detail['nomor_po']; ?></p>
                    <p class="card-text">Kode Pakan : <?php echo $detail['kode_pakan']; ?> </p>
                    <p class="card-text">Nomor Pallet : <?php echo $detail['nomor_pallet']; ?></p>
                    <p class="card-text">Lokasi Gudang : <?php echo $detail['lokasi_gudang']; ?></p>
                    <p class="card-text">Line Packing : <?php echo $detail['line_packing']; ?></p>
                    <p class="card-text">Waktu : <?php echo $detail['waktu']; ?></p>
                    <p class="card-text">Shift : <?php echo $detail['shift']; ?></p>
                    <p class="card-text">Expired Date : <?php echo $detail['expired_date']; ?></p>
                    <a href="<?= base_url() ?>C_fifo" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        <!-- <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div> -->
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->