<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ganti Password Akun</h1>
    </div>

    <!-- flashdata kalau berhasil nambah -->
    <?= $this->session->flashdata('message') ?>


    <!-- Content Row --> 
    <!-- <div class="row"> -->

    <div class="">
        <form method="POST" action="<?= base_url() ?>C_auth/gantipassword">
            <div class="form-group col-md-6">
                <label for="message-text" class="col-form-label">Password Lama :</label>
                <input type="password" class="form-control" id="passwordLama" name="passwordLama" required></input>
                <?= form_error('passwordLama', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
            <div class="form-group col-md-6">
                <label for="message-text" class="col-form-label">Password Baru :</label>
                <input type="password" class="form-control" id="passwordBaru1" name="passwordBaru1" required></input>
                <?= form_error('passwordBaru1', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
            <div class="form-group col-md-6">
                <label for="message-text" class="col-form-label">Ulangi Password Baru :</label>
                <input type="password" class="form-control" id="passwordBaru2" name="passwordBaru2" required></input>
                <?= form_error('passwordBaru2', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
            <div class="form-group col-md-8 float-right">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                <button type="submit" class="btn btn-primary">Ganti Password</button>
            </div>
        </form>
    </div>
</div>

<!-- </div> -->
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->