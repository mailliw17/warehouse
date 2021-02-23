<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Akun Operator</h1>
    </div>

    <!-- flashdata kalau berhasil nambah -->
    <?= $this->session->flashdata('message') ?>

    <?php if ($this->session->flashdata('message_berhasil')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Akun Baru Berhasil Dibuat !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('message_berhasil_gantipass')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Password Akun Operator Berhasil Diganti !
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
                Hanya Akun Operator Input & Operator Output saja yang ditampilkan
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Posisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $row) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $row->nama; ?> </td>
                                <td> <?php echo $row->username; ?> </td>
                                <td> <?php echo $row->role; ?> </td>
                                <td>
                                    <a href="<?php echo base_url('auth/gantipasswordoperator/') . $row->id_user ?>" class="btn btn-info btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Edit Password</span>
                                    </a>

                                    <a onclick="javacript:return confirm('Anda yakin menghapus akun? Akun yang sudah terhapus tidak bisa dikembalikan !')" href="<?php echo base_url('auth/hapusakun/') . $row->id_user ?>" class=" btn btn-danger btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus Akun</span>
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