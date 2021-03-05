<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">KODE PAKAN</h1>
    </div>

    <!-- flashdata kalau berhasil nambah -->
    <?php if ($this->session->flashdata('message_berhasil')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Kode Pakan Baru Berhasil Dibuat !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('message_hapus')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Kode Pakan Berhasil Dihapus !
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
                <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#kodePakanModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Kode Pakan</span>
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Kode Pakan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pakan as $p) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $p['nama_pakan'] ?> </td>
                                <td>

                                    <a onclick="javacript:return confirm('Anda yakin menghapus kode pakan?')" href="<?php echo base_url('kodepakan/hapuskodepakan/') . $p['id_pakan'] ?>" class=" btn btn-danger btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus Kode Pakan</span>

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
<div class="modal fade" id="kodePakanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Kode Pakan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>kodepakan/tambahkodepakan">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kode Pakan :</label>
                        <input type="text" class="form-control" id="nama_pakan" name="nama_pakan" autocomplete="off" required>
                        <?= form_error('nama_pakan', ' <small class="text-danger pl-3">', '</small>');  ?>
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