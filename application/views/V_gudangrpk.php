<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stock Gudang REPK</h1>
    </div>

    <?php if ($this->session->flashdata('berhasil-repack')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Pallet berhasil di repack!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('gagal')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Pallet masih kosong, silahkan masukan Bag ke pallet yang sudah berisi !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('pallettidakada')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Pallet tidak terdaftar
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('bedakodepakan')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Pallet yang ditimpa berbeda kode pakan !
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
                            <!-- <th>ID Pallet</th> -->
                            <th>Kode pakan</th>
                            <th>Tanggal Produksi</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Qty Robek</th>
                            <th>Status</th>
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

                                <!-- <td> <?php echo $p['id_pallet']; ?> </td> -->

                                <td> <?php echo $p['kode_pakan']; ?> </td>

                                <td>
                                    <?php
                                    echo date("d-M-Y", strtotime($p['waktu_pembuatan']));
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo date("d-M-Y", strtotime($p['expired_date']));
                                    ?>
                                </td>

                                <td> <?php echo $p['qty']; ?> Bag</td>

                                <td> <?php if (is_null($p['qty_rpk'])) {
                                            echo '
                                            <span style="font-size: 30px; color: Red;">
                                            <i class="far fa-times-circle"></i> <small>Belum Repack</small>
                                            </span>
                                            ';
                                        } else {
                                            $a = $p['qty_rpk'];
                                            echo '
                                            <span style="font-size: 30px; color: Green;">
                                            <i class="fas fa-clipboard-check"></i> <small>' . $a . ' Bag</small>
                                            </span>
                                            ';
                                        }  ?> </td>

                                <td>


                                    <a id="detail" type="button" data-toggle="modal" data-target="#modalRepack" data-id_pallet="<?= $p['id_pallet'] ?>" data-qty="<?= $p['qty'] ?>" class="btn btn-success btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Selesai Repack</span>
                                    </a>

                                    <a href="<?php echo base_url('gudangrpk/tumpang/') . $p['id_pallet'] ?>" class="btn btn-info btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-exchange-alt"></i>
                                        </span>
                                        <span class="text">Pindahkan</span>
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

<!-- Modal Repack -->
<div class="modal fade" id="modalRepack" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bag Repacking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('gudangrpk/selesairepack') ?>">
                    <div class="form-group">

                        <input type="hidden" class="form-control" id="id_pallet" name="id_pallet" autocomplete="off" readonly>

                        <label for="recipient-name" class="col-form-label">Qty Robek : </label>
                        <input type="number" class="form-control" id="qty" name="qty" autocomplete="off" readonly>

                        <label for="recipient-name" class="col-form-label">Qty Repack : </label>
                        <input type="number" class="form-control" id="qty_rpk" name="qty_rpk" autocomplete="off" required autofocus>


                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#detail', function() {
            var id_pallet = $(this).data('id_pallet');
            var qty = $(this).data('qty');
            $('#id_pallet').val(id_pallet);
            $('#qty').val(qty);

            document.getElementById("qty_rpk").max = qty;
            document.getElementById("qty_rpk").min = 1;
        })
    })
</script>