<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Nomor PO</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a> -->
    </div>

    <?php if ($this->session->flashdata('berhasil')) : ?>
        <!-- <h3 class="panel-title">Arahkan Kode QR Ke Kamera!</h3> -->
        <audio controls autoplay hidden>
            <source src="<?= base_url() ?>assets/berhasil.mp3" type="audio/mpeg">
        </audio>
    <?php endif; ?>

    <form action="<?= base_url() ?>inputpo/sendpo/" method="POST">
        <!-- HIDDEN ID PALLET -->
        <div class="form-row">
            <input type="hidden" class="form-control" id="id_pallet" readonly name="id_pallet" value="<?= $id_pallet ?>">
            <div class="form-group col-md-4">
                <label for="nomorpo">Nomor PO</label>
                <input list="no_po" class="form-control" id="nomor_po" name="nomor_po" placeholder="Masukan nomor PO..." autocomplete="off" onkeyup="stoppedTyping()" onchange="autoFillKodePakan(this.value)" required>
                <datalist id="no_po">
                    <?php
                    foreach ($no_po as $row) : ?>
                        <option value="<?= $row->nomor_po ?>"></option>
                    <?php endforeach; ?>
                </datalist>
            </div>
            <div class="form-group col-md-4">
                <label for="kodepakan">Kode Pakan</label>
                <input list="kd_pakan" name="kode_pakan" id="kode_pakan" class="form-control" autocomplete="off" placeholder="Masukan kode pakan" required onkeyup="stoppedTyping()" />
                <datalist id="kd_pakan">
                    <?php
                    foreach ($kode_pakan as $kp) : ?>
                        <option value="<?= $kp->nama_pakan ?>"></option>
                    <?php endforeach; ?>
                </datalist>
            </div>
        </div>

        <!-- BARIS 2 -->
        <div class="form-row">
            <!-- <div class="form-group col-md-4">
                <div class="badge badge-info" id=""></div>
            </div> -->
            <div class="form-group col-md-2">
                <label for="lokasigudang">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty" placeholder="Ketikan Jumlah Bag.." autocomplete="off" onkeyup="stoppedTyping()" value=56 required>
            </div>
            <div class="form-group col-md-3">
                <label for="linepacking">Line Robot</label>
                <select id="line_packing" name="line_packing" class="form-control" required>
                    <option selected disabled>--SILAHKAN PILIH--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <!-- <div class="form-group col-md-3">
                <label for="lokasigudang">Lokasi Gudang</label>
                <input type="text" class="form-control" id="lokasi_gudang" name="lokasi_gudang" placeholder="Ketik lokasi gudang..." required autocomplete="off" onkeyup="stoppedTyping()">
            </div> -->

            <div class="form-group col-md-3">
                <label for="lokasigudang">Lokasi Gudang</label>
                <input list="lok_gudang" name="lokasi_gudang" id="lokasi_gudang" class="form-control" autocomplete="off" placeholder="Masukan lokasi gudang" required oninput="stoppedTyping()" />
                <datalist id="lok_gudang">
                    <?php
                    foreach ($lokasi_gudang as $lg) : ?>
                        <option value="<?= $lg->line_gudang ?>"> <?php echo $lg->line_gudang; ?> - Sisa <?php echo $lg->kapasitas_pallet; ?> Pallet </option>
                    <?php endforeach; ?>
                </datalist>
            </div>

        </div>
        <!-- BARIS 3 -->
        <div class="form-row">
            <div class=" form-group col-md-2">
                <label for="nomorpallet">Nomor Pallet</label>
                <input type="number" class="form-control" id="nomor_pallet" name="nomor_pallet" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="waktu">Tanggal Produksi</label>
                <input type="datetime" class="form-control" id="waktu_pembuatan" name="waktu_pembuatan" value="<?php date_default_timezone_set("Asia/Jakarta");
                                                                                                                echo date("d-M-Y");  ?>" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="shift">Shift</label>
                <input type="text" readonly class="form-control" id="shift" name="shift" value="<?php
                                                                                                date_default_timezone_set("Asia/Jakarta");
                                                                                                date("H:i:s");
                                                                                                if ((date('H') >= 7 && date('H') < 15) || (date('H') == 15 && date('i') == 0)) {
                                                                                                    echo '1';
                                                                                                } else if ((date('H') >= 15 && date('H') < 23) || (date('H') == 23 && date('i') == 0)) {
                                                                                                    echo '2';
                                                                                                } else {
                                                                                                    echo '3';
                                                                                                }
                                                                                                ?>">
            </div>


            <div class="form-group col-md-2">
                <label for="expireddate">Tanggal Kadaluarsa (21 hari)</label>
                <input type="text" class="form-control" id="expired_date" name="expired_date" readonly value="<?php
                                                                                                                date_default_timezone_set("Asia/Jakarta");
                                                                                                                echo date('d-M-Y', strtotime(' + 21 days'));
                                                                                                                ?>">
            </div>

            <!-- operator packing -->
            <input type="hidden" class="form-control" id="operator" name="operator" value="<?= $this->session->userdata('nama'); ?>" readonly>

        </div>
        <hr>
        <div class="form-group col-md-8">
            <button type="submit" id="submit_button" class="btn btn-facebook btn-block" disabled>OK</button>
        </div>
    </form>
    <!-- <div class="form-row"> -->
    <!-- <div class="col-md-6" style="position: relative;margin-top: -270px;margin-left: 0px;">
        <div class="list-group" id="show-list">
            <a href="#" class="list-group-item list-group-item-action border-1">List 1</a>
        </div>
    </div> -->
    <!-- </div> -->
</div>
<!-- /.container-fluid -->
</div>

<script type="text/javascript">
    function stoppedTyping() {
        if ((document.getElementById("nomor_po").value !== "") && (document.getElementById("kode_pakan").value !== "") && (document.getElementById("lokasi_gudang").value !== "") && (document.getElementById("qty").value !== "")) {
            document.getElementById('submit_button').disabled = false;
        } else {
            document.getElementById('submit_button').disabled = true;
        }
    }

    // fungsi ini udah oke
    function autoFillKodePakan(value) {
        var nomor_po = value;
        var kode_pakan = document.getElementById("kode_pakan");

        $.ajax({
            url: "<?php echo base_url(); ?>index.php/inputpo/getKodePakan",
            method: "POST",
            data: {
                nomor_po: nomor_po
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data[0] != null) { // nim ditemukan
                    //$.each(data, function(key, val) {
                    // console.log(val.kode_pakan);
                    kode_pakan.value = data[0];
                    document.getElementById("nomor_pallet").value = data[1];
                    document.getElementById("kode_pakan").readOnly = true;
                    // });
                } else {
                    console.log('Tidak ditemukan');
                    kode_pakan.value = '';
                    document.getElementById("kode_pakan").readOnly = false;
                    document.getElementById("nomor_pallet").value = data[1];
                }

            }
        });
    }
</script>

<script src="<?= base_url() ?>vendor/sweetalert.js"></script>

<?php if ($this->session->flashdata('sudah_isi')) : ?>
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Pallet sudah terisi',
            text: 'Timpa dengan data baru?',
            footer: '<strong><a href="<?= base_url() ?>inputpo/handheld">KLIK UNTUK BATAL MENGISI</a></strong>'
        })
    </script>
<?php endif; ?>