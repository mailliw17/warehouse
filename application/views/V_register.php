<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Akun Baru</h1>
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
        <form method="POST" action="<?= base_url() ?>auth/register">
            <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Nama :</label>
                <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required autofocus>
            </div>
            <div class="form-group col-md-6">
                <label for="message-text" class="col-form-label">Username :</label>
                <input type="text" class="form-control" id="username" name="username" required autocomplete="off"></input>
                <?= form_error('username', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">Bagian</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="" selected disabled>--SILAHKAN PILIH--</option>
                    <option value="Admin">Admin</option>
                    <option value="Operator Packing">Operator Packing</option>
                    <option value="Juru Muat">Juru Muat</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="message-text" class="col-form-label">Password :</label>
                <input type="password" class="form-control" id="password1" name="password1" required></input>
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-md-6">
                <label for="message-text" class="col-form-label">Ulangi Password :</label>
                <input type="password" class="form-control" id="password2" name="password2" required></input>
            </div>
            <div class="form-group col-md-8 float-right">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                &nbsp; &nbsp; &nbsp;
                <button type="submit" class="btn btn-primary">Buat Akun</button>
            </div>
        </form>
    </div>
</div>

<!-- </div> -->
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->