<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Peta Lokasi Gudang</h1>
    </div>

    <!-- flashdata kalau berhasil nambah -->
    <?php if ($this->session->flashdata('message_berhasil')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Line Gudang Baru Berhasil Dibuat !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('message_edit')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Line Gudang Berhasil Diubah !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('message_hapus')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Line Gudang Berhasil Dihapus !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>


    <!-- Content Row -->
    <!-- <div class="row"> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalPLG">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Lokasi Gudang</span>
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Line Gudang</th>
                            <th>Kapasitas Pallet</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($plg as $p) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $p['line_gudang'] ?> </td>
                                <td> <?php echo $p['kapasitas_pallet'] ?> </td>
                                <td>

                                    <a href="<?php echo base_url('petalokasigudang/hapuslokasi/') . $p['id'] ?>" class=" btn btn-danger btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </a>

                                    <a href="<?php echo base_url('petalokasigudang/editlokasi/') . $p['id'] ?>" class=" btn btn-warning btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="text">Edit</span>
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

<!-- </div> -->
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal Kode Pakan Baru -->
<div class="modal fade" id="modalPLG" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Lokasi Gudang Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>petalokasigudang/tambahlokasi">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Line Gudang :</label>
                        <input type="text" class="form-control" id="line_gudang" name="line_gudang" autocomplete="off" required>
                        <?= form_error('line_gudang', ' <small class="text-danger pl-3">', '</small>');  ?>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kapasitas Pallet :</label>
                        <input type="number" class="form-control" id="kapasitas_pallet" name="kapasitas_pallet" autocomplete="off" required>
                        <?= form_error('kapasitas_pallet', ' <small class="text-danger pl-3">', '</small>');  ?>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>