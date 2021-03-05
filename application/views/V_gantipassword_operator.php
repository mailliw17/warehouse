<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Akun Operator</h1>
    </div>

    <?php if ($this->session->flashdata('message_berhasil')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Akun Baru Berhasil Dibuat !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('message_gagal')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Akun Baru Gagal Dibuat !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Content Row -->
    <!-- <div class="row"> -->

    <div class="">
        <form method="POST" action="">
            <div class="form-group col-md-6">
                <input type="hidden" class="form-control" id="id_user" name="id_user" readonly value="<?= $user['id_user']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Nama :</label>
                <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" readonly value="<?= $user['nama']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="message-text" class="col-form-label">Username :</label>
                <input type="text" class="form-control" id="username" name="username" readonly required autocomplete="off" value="<?= $user['username']; ?>"></input>
                <?= form_error('username', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">Bagian</label>
                <input type="text" class="form-control" id="role" name="role" readonly required autocomplete="off" value="<?= $user['role']; ?>"></input>
            </div>
            <div class="form-group col-md-6">
                <label for="message-text" class="col-form-label">Password Baru :</label>
                <input type="password" class="form-control" id="password" name="password" required></input>
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <!-- <div class="form-group col-md-6">
                <label for="message-text" class="col-form-label">Ulangi Password Baru :</label>
                <input type="password" class="form-control" id="password2" name="password2" required></input>
            </div> -->
            <div class="form-group col-md-8 float-right">
                <a type="button" class="btn btn-sm btn-secondary" href="<?= base_url() ?>auth/kelolaakun">Batal</a>
                &nbsp; &nbsp;
                <button type="submit" class="btn btn-sm btn-primary">Ganti Password</button>
            </div>
        </form>
    </div>
</div>

<!-- </div> -->
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->