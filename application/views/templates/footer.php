<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>PT.Charoen Pokphand Indonesia - Developed By William</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin keluar dari sistem?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Batal
                </button>
                <a class="btn btn-primary" href="<?= base_url() ?>auth/logout">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Operator Baru -->
<div class="modal fade" id="operatorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Akun Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>auth/register">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama :</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Username :</label>
                        <input type="text" class="form-control" id="username" name="username" required autocomplete="off"></input>
                        <?= form_error('username', ' <small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Bagian</label>
                        <select id="role" name="role" class="form-control" required>
                            <option value="">--SILAHKAN PILIH--</option>
                            <option value="Admin">Admin</option>
                            <option value="Operator Input">Operator Input</option>
                            <option value="Operator Output">Operator Output</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Password :</label>
                        <input type="password" class="form-control" id="password1" name="password1" required></input>
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Ulangi Password :</label>
                        <input type="password" class="form-control" id="password2" name="password2" required></input>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Buat Akun</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

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

<!-- Pelanggan Pakan Baru -->
<div class="modal fade" id="pelangganModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Pelanggan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>pelanggan/tambahpelanggan">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Pelanggan :</label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" autocomplete="off" required>
                        <?= form_error('nama_pelanggan', ' <small class="text-danger pl-3">', '</small>');  ?>
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

<!-- Masukkan nomor DO checkout -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukkan Nomor DO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>inputdo/checkout/">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nomor DO :</label>
                        <input type="number" class="form-control" id="nomor_do_checkhout" name="nomor_do_checkhout" autocomplete="off" required>
                        <?= form_error('nomor_do', ' <small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                    <!-- <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama :</label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" autocomplete="off" required>
                        <?= form_error('nama_pelanggan', ' <small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Plat Nomor :</label>
                        <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" autocomplete="off" required>
                        <?= form_error('plat_nomor', ' <small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tanggal :</label>
                        <input type="text" class="form-control" id="tanggal_keluar" name="tanggal_keluar" autocomplete="off" required>
                        <?= form_error('tanggal_keluar', ' <small class="text-danger pl-3">', '</small>');  ?>
                    </div> -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>vendor/sbadmin2/js/sb-admin-2.min.js"></script>

<!-- Font Awesome JS -->
<script src="<?= base_url() ?>vendor/fontawesome/js/all.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>vendor/sbadmin2/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>vendor/sbadmin2/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>vendor/sbadmin2/demo/datatables-demo.js"></script>

<!-- Page level plugins -->
<!-- <script src="<?= base_url() ?>vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="<?= base_url() ?>vendor/sbadmin2/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>vendor/sbadmin2/demo/chart-pie-demo.js"></script> -->

<!-- Datepicker -->
<script src="<?= base_url() ?>vendor/datepicker/dist/js/bootstrap-datepicker.min.js"> </script>

<!-- Chart JS -->
<!-- <script src="<?= base_url() ?>vendor/chartjs/Chart.js"></script> -->

<script>
    $(function() {
        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#isiqty', function() {
            var nomor_do = $(this).data('nomor_do');
            var id_pallet = $(this).data('id_pallet');
            var nomor_po = $(this).data('nomor_po');
            var kode_pakan = $(this).data('kode_pakan');
            var lokasi_gudang = $(this).data('lokasi_gudang');
            var waktu_pembuatan = $(this).data('waktu_pembuatan');
            var expired_date = $(this).data('expired_date');
            var qty = $(this).data('qty');

            $('.qty').text(qty);

            document.getElementById("nomor_do").value = nomor_do;
            document.getElementById("id_pallet").value = id_pallet;
            document.getElementById("nomor_po").value = nomor_po;
            document.getElementById("kode_pakan").value = kode_pakan;
            document.getElementById("lokasi_gudang").value = lokasi_gudang;
            document.getElementById("waktu_pembuatan").value = waktu_pembuatan;
            document.getElementById("expired_date").value = expired_date;
            document.getElementById("qty").value = qty;

            var input = document.getElementById("qty");
            input.setAttribute("max", qty);
        })
    })
</script>

<script>
    $('#checkoutModal').on('shown.bs.modal', function() {
        $('#nomor_do').focus();
    })
</script>

</body>

</html>