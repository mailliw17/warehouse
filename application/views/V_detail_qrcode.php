<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Info Scan QR Pallet</h1>
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

                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Nomor PO :</th>
                                <td><?php echo $detail['nomor_po']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Kode Pakan :</th>
                                <td><?php echo $detail['kode_pakan']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Quantity :</th>
                                <td><?php
                                    if ($detail['qty'] === NULL) {
                                        echo '';
                                    } else {
                                        echo $detail['qty'];
                                        echo ' Bag';
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor Pallet :</th>
                                <td><?php echo $detail['nomor_pallet']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Lokasi Gudang :</th>
                                <td><?php echo $detail['lokasi_gudang']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Line Packing :</th>
                                <td><?php echo $detail['line_packing']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Waktu Pembuatan :</th>
                                <td><?php
                                    if ($detail['waktu_pembuatan'] === NULL) {
                                        echo '';
                                    } else {
                                        echo date("d-M-Y", strtotime($detail['waktu_pembuatan']));
                                    }
                                    ?>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Shift :</th>
                                <td><?php echo $detail['shift']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Expired Date :</th>
                                <td><?php
                                    if ($detail['expired_date'] === NULL) {
                                        echo '';
                                    } else {
                                        echo date("d-M-Y", strtotime($detail['expired_date']));
                                    }
                                    ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="<?= base_url() ?>kodeqr/scandeteksi_handheld" class="btn btn-primary">Kembali</a>
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