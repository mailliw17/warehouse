<?php if ($this->session->flashdata('berhasil')) : ?>
    <!-- <h3 class="panel-title">Arahkan Kode QR Ke Kamera!</h3> -->
    <audio controls autoplay hidden>
        <source src="<?= base_url() ?>assets/berhasil.mp3" type="audio/mpeg">
    </audio>
<?php endif; ?>

<div class="form-group">
    <!-- <form enctype="multipart/form-data" action="<?= base_url() ?>inputdo/senddo" method="POST" name="add_name" id="add_name"> -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <center>
            <h3>Nomor DO : <?= $nomor_do ?> </h3>
            <h5>Waktu Muat : <?php date_default_timezone_set("Asia/Jakarta");
                                echo date("d-M-Y H:i:s");  ?></h5>
            <!-- <h5>Pelanggan : <?= $pelanggan ?> </h5>
                <h5>Plat Nomor : <?= $plat_nomor ?> </h5> -->
        </center>

        <hr>



        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <!-- <h1 class="h3 mb-0 text-gray-800">Aplikasi Point of Sale</h1> -->
            <!-- <div class="form-group col-md-3">
                    <label for="idpallet">ID transaksi</label>
                    <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="<?php echo time(); ?>" readonly>
                </div> -->

            <input type="hidden" class="form-control" id="nomor_do" name="nomor_do" autocomplete="off" readonly>

            <input type="hidden" class="form-control datepicker" id="waktu_muat" name="waktu_muat" autocomplete="off" value="<?php date_default_timezone_set("Asia/Jakarta");
                                                                                                                                echo date("d-M-Y H:i:s");  ?>">

            <!-- <input type="hidden" class="form-control" id="pelanggan" name="pelanggan" autocomplete="off" readonly>

            <input type="hidden" class="form-control" id="plat_nomor" name="plat_nomor" autocomplete="off" readonly> -->
        </div>


        <form action="">
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Scan Kode QR</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="id_pallet_scan" name="id_pallet_scan" autocomplete="off" oninput="cek_length()" autofocus>
                </div>
                <div class="col-sm-4">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#qtyMuatModal">
                        Cari
                    </a>
                </div>
            </div>
        </form>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Isi Pakan
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Kode Pakan</th>
                                <th>Lokasi</th>
                                <th>Qty</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_do as $db) :
                            ?>
                                <tr>
                                    <td> <?php echo $no; ?> </td>
                                    <td> <?php echo $db['kode_pakan']; ?> </td>
                                    <td> <?php echo $db['lokasi_gudang']; ?> </td>
                                    <td> <?php echo $db['qty']; ?> </td>
                                    <td>
                                        <?php echo $db['qty_muat']; ?>
                                        <!-- <span class="badge badge-danger">Belum Muat</span> -->
                                    </td>
                                </tr>
                            <?php $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container">
            <button class="btn btn-success btn-block" data-toggle="modal" data-target="#pelanggan-platno"><i class="fas fa-check"></i> PROSES MUAT SELESAI</button>
        </div>
    </div>

</div>
</div>

<!-- <script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script> -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<?php if ($this->session->flashdata('insert_multidata_berhasil')) : ?>
    <script>
        Swal.fire(
            'Berhasil',
            'Transaksi sukses dilaksanakan!',
            'success'
        )
    </script>
<?php endif; ?>

<!-- Input Jumlah Bag  -->
<?php
foreach ($data_do as $db) :
?>
    <div class="modal fade" id="qtyMuatModal_<?= $db['id_pallet']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukan Jumlah Bag </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('inputdo/updateQtyMuat') ?>">
                        <div class="form-group">
                            <h5>Jenis Pakan : <?= $db['kode_pakan'] ?></h5>

                            <h5> <strong>Qty : <?= $db['qty'] ?> <span class="qty"></span></strong> </h5>
                            <label for="recipient-name" class="col-form-label">Qty Muat : </label>
                            <input type="hidden" class="form-control" id="id_pallet" name="id_pallet" value="<?= $db['id_pallet']; ?>">
                            <input type="hidden" class="form-control" id="nomor_do" name="nomor_do" value="<?= $db['nomor_do']; ?>">

                            <input type="number" class="form-control" id="qty_muat" name="qty_muat" autocomplete="off" required autofocus>

                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <!-- fungsi ambilBag belum dibuat -->
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
endforeach; ?>

<!-- Modal Submit Pelanggan dan Plat nomor -->
<div class="modal fade" id="pelanggan-platno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukan Jumlah Bag </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('inputdo/historyDo') ?>">
                    <div class="form-group">
                        <h3>PROSES MUAT HAMPIR SELESAI !</h3>
                        <h5>Silahkan Isi !</h5>


                        <input type="hidden" class="form-control" id="nomor_do" name="nomor_do" value="<?= $db['nomor_do']; ?>">

                        <label for="recipient-name" class="col-form-label">Nama Pelanggan : </label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" autocomplete="off" required autofocus>

                        <label for="recipient-name" class="col-form-label">Plat Nomor : </label>
                        <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" autocomplete="off" required>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <!-- fungsi ambilBag belum dibuat -->
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function cek_length() {
        var kode_qr = document.getElementById("id_pallet_scan").value;

        if (kode_qr.length == 10) {
            console.log(kode_qr);
            var id_modal = "#qtyMuatModal_" + String(kode_qr);
            console.log(id_modal);
            $(id_modal).modal();
            //document.getElementById(id_modal).style.display = "block";
        }
    }
</script>