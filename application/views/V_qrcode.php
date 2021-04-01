<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Informasi dan Print QR Pallet</h1>
        <a href="<?= base_url() ?>kodeqr/tambahqrcode" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Buat QR CODE BARU</a>
    </div>

    <!-- flashdata kalau berhasil nambah -->
    <?= $this->session->flashdata('message') ?>

    <?php if ($this->session->flashdata('message_berhasil')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            QR Code Pallet Berhasil Dibuat !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Lacak jumlah dan status pallet
            </h6>
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Kode Pallet</th>
                            <th>Nomor PO</th>
                            <th>Isi pakan</th>
                            <th>Nomor Pallet</th>
                            <th>Qty</th>
                            <th>Print</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pallet as $p) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $p['id_pallet']; ?> </td>
                                <td> <?php if (is_null($p['nomor_po'])) {
                                            echo 'Kosong';
                                        } else {
                                            echo $p['nomor_po'];
                                        }  ?> </td>
                                <td> <?php if (is_null($p['kode_pakan'])) {
                                            echo 'Kosong';
                                        } else {
                                            echo $p['kode_pakan'];
                                        }  ?> </td>
                                <td> <?php if (is_null($p['nomor_pallet'])) {
                                            echo 'Kosong';
                                        } else {
                                            echo $p['nomor_pallet'];
                                        }  ?></td>
                                <td> <?php if (is_null($p['qty'])) {
                                            echo 'Kosong';
                                        } else {
                                            echo $p['qty'];
                                        }  ?></td>
                                <td> <?php if (is_null($p['print'])) {
                                            echo '
                                            <span style="font-size: 30px; color: Red;">
                                            <i class="fas fa-print"></i>
                                            </span>
                                            ';
                                        } else {
                                            echo '
                                            <span style="font-size: 30px; color: Green;">
                                            <i class="fas fa-clipboard-check"></i>
                                            </span>
                                            ';
                                        }  ?> </td>
                                <td>
                                    <a href="<?php echo base_url('kodeqr/detailqrcode/') . $p['id_pallet'] ?>" class="btn btn-info btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Detail</span>
                                    </a>

                                    <a onclick="javacript:return confirm('Print QR dan tempelkan langsung ke Pallet!')" href="<?php echo base_url('kodeqr/printqrcode/') . $p['id_pallet'] ?>" class="btn btn-warning btn-icon-split btn-sm stylebutton" target="_blank">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-qrcode"></i>
                                        </span>
                                        <span class="text">Print QR Pallet</span>
                                    </a>

                                    <a onclick="javacript:return confirm('Anda yakin menghapus akun? Akun yang sudah terhapus tidak bisa dikembalikan !')" href="<?php echo base_url('kodeqr/hapusqrcode/') . $p['id_pallet'] ?>" class=" btn btn-danger btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus Pallet</span>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal Generate QR Baru -->
<!-- <div class="modal fade" id="QRModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Kode QR Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>kodeqr/tambahqrcode">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kode QR :</label>
                        <input type="text" class="form-control" id="id_pallet" name="id_pallet" autocomplete="off" required value=" <?php echo time(); ?>" readonly>
                        <?= form_error('id_pallet', ' <small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tanggal Pembuatan QR :</label>
                        <input type="datetime" class="form-control" id="tanggal_pallet" name="tanggal_pallet" autocomplete="off" required value=" <?php echo date('d-M-Y'); ?> " readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->