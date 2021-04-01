<!-- Begin Page Content -->
<div class="container-fluid ">
    <a href="<?= base_url() ?>fifo" class="btn btn-google btn-block"><i class="fas fa-sign-out-alt"></i>KELUAR DARI PROSES FIFO</a>
    <hr>

    <?php if ($this->session->flashdata('berhasil')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Pakan Berhasil Dimasukan ke FIFO Forklift !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('gagal')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Pallet dan kode pakan ini sudah dipilih sebelumnya ! Silahkan pilih pallet lain
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('kosongan')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Silahkan isi Quantity Bag !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('salahfifo')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            FIFO mu salah !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-6">
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Tata Cara FIFO Pakan</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <ol>
                            <li>Ketikkan <strong>kode pakan</strong> pada tabel pencarian </li>
                            <li>Hasil pencarian teratas adalah pallet tertua berdasarkan tanggal dan nomor pallet</li>
                            <li>Klik tombol <strong>AMBIL</strong> </li>
                            <li>Masukkan jumlah bag yang akan diambil</li>
                            <li style="color: red;">*Satu Nomor DO tidak dapat mengambil pallet yang sama</li>
                            <li>Jika sudah selesai, centang form FIFO dan cetak FIFO</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6">

            <div class="alert alert-success" role="alert">
                <h5 class="alert-heading">PAKAN TERPILIH (Nomor DO : <?= $nomor_do ?>) :</h5>
                <hr>

                <div id="pakan_terpilih">
                    <?php
                    if ($data_checker != false) :
                        foreach ($data_checker as $dc) : ?>
                            <div class="alert alert-primary" role="alert">
                                Kode Pakan : <?php echo $dc['kode_pakan']; ?> || Qty : <?php echo $dc['qty_checker']; ?> || Lokasi : <?php echo $dc['lokasi_gudang']; ?>
                            </div>
                        <?php endforeach;
                    else :
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Belum ada pakan yang terpilih
                        </div>
                    <?php endif; ?>
                </div>
                <hr>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="ceklis" onclick="disabled_tombol(this)">
                    <label class="form-check-label" for="exampleCheck1">Form FIFO sudah benar dan siap cetak</label>
                </div>
                <hr>
                <div class="">
                    <form action="<?php echo base_url('cetak/checker/') . $nomor_do ?>" target="_blank">
                        <button type="submit" id="submit_button" class="btn btn-primary" disabled><i class="fas fa-print"></i> CETAK FIFO</button>
                    </form>
                </div>
            </div>
        </div>

    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                STOCK GUDANG TERKINI
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Kode Pakan</th>
                            <th>Qty</th>
                            <th>Lokasi</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Nomor Pallet</th>
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
                                <td> <?php echo $p['kode_pakan'] ?> </td>
                                <td> <?php echo $p['qty'] ?> </td>
                                <td> <?php echo $p['lokasi_gudang'] ?> </td>
                                <td> <?php echo  date("d-M-Y", strtotime($p['waktu_pembuatan'])) ?> </td>
                                <td> <?php echo $p['nomor_pallet']; ?> </td>

                                <td>
                                    <a id="ambilBagIni" href="#" class="btn btn-info btn-icon-split btn-sm" data-kode_pakan="<?= $p['kode_pakan'] ?>" data-id_pallet="<?= $p['id_pallet'] ?>" data-lokasi_gudang="<?= $p['lokasi_gudang'] ?>" data-expired_date="<?= $p['expired_date'] ?>" data-waktu_pembuatan="<?= $p['waktu_pembuatan'] ?>" data-qty="<?= $p['qty'] ?>">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-dolly"></i>
                                        </span>
                                        <span class="text">Ambil</span>
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

<div class="modal fade" id="modalAmbilBagIni" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ambil Pallet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <input type="hidden" id="nomor_do" name="nomor_do" value="<?= $nomor_do ?>"></input>
                            <input type="hidden" id="id_pallet" name="id_pallet"></input>
                            <input type="hidden" id="lokasi_gudang" name="lokasi_gudang"></input>
                            <input type="hidden" id="waktu_pembuatan" name="waktu_pembuatan"></input>
                            <input type="hidden" id="expired_date" name="expired_date"></input>
                            <input type="hidden" id="waktu_checker" name="waktu_checker" value="<?php date_default_timezone_set("Asia/Jakarta");
                                                                                                echo date("Y-m-d H:i:s");  ?>"></input>
                            <tr>
                                <th>Kode Pakan :</th>
                                <td> <input class="form-control" type="text" id="kode_pakan" name="kode_pakan" readonly></input> </td>
                            </tr>
                            <tr>
                                <th>Stock :</th>
                                <td> <input class="form-control" type="number" id="qty" readonly></input> </td>
                            </tr>
                            <tr>
                                <th>Ambil :</th>
                                <td> <input type="number" id="qty_checker" name="qty_checker" value=56 oninput="disabledButton()"> Bag</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" id="tombol-ambil" onclick="updateStokGudang()">Ambil</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#ambilBagIni', function() {
            //function fungsi_ambil_bag() {
            var kode_pakan = $(this).data('kode_pakan');
            var qty = $(this).data('qty');
            var id_pallet = $(this).data('id_pallet');
            var lokasi_gudang = $(this).data('lokasi_gudang');
            var waktu_pembuatan = $(this).data('waktu_pembuatan');
            var expired_date = $(this).data('expired_date');
            $('#kode_pakan').val(kode_pakan);
            $('#qty').val(qty);
            $('#id_pallet').val(id_pallet);
            $('#lokasi_gudang').val(lokasi_gudang);
            $('#waktu_pembuatan').val(waktu_pembuatan);
            $('#expired_date').val(expired_date);
            // var batas = qty

            document.getElementById("qty_checker").max = qty;
            document.getElementById("qty_checker").min = 1;
            document.getElementById("qty_checker").value = qty;
            $.ajax({
                type: 'POST',
                data: 'id_pallet=' + id_pallet + '&kode_pakan=' + kode_pakan,
                url: '<?= base_url() ?>index.php/fifo/checkPallet',
                dataType: 'JSON',
                success: function(data) {
                    if (data == 2) {
                        Swal.fire({
                            title: 'Apakah anda yakin?',
                            text: "FIFO yang diambil tidak sesuai, tapi masih toleransi waktu 2 hari",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya',
                            cancelButtonText: 'Batal',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#modalAmbilBagIni").modal('show');
                            }
                        })
                    } else if (data == 1) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Pallet tidak sesuai FIFO !',
                        })
                    } else if (data == 3) {
                        $("#modalAmbilBagIni").modal('show');
                    }
                }
            });
            //}
        })
    })

    function updateStokGudang() {
        var nomor_do = $("[name='nomor_do']").val();
        var id_pallet = $("[name='id_pallet']").val();
        var kode_pakan = $("[name='kode_pakan']").val();
        var lokasi_gudang = $("[name='lokasi_gudang']").val();
        var waktu_pembuatan = $("[name='waktu_pembuatan']").val();
        var expired_date = $("[name='expired_date']").val();
        var waktu_checker = $("[name='waktu_checker']").val();
        var qty_checker = $("[name='qty_checker']").val();

        $.ajax({
            type: 'POST',
            data: 'nomor_do=' + nomor_do + '&id_pallet=' + id_pallet + '&kode_pakan=' + kode_pakan + '&lokasi_gudang=' + lokasi_gudang + '&waktu_pembuatan=' + waktu_pembuatan + '&expired_date=' + expired_date + '&waktu_checker=' + waktu_checker + '&qty_checker=' + qty_checker,
            url: '<?= base_url() ?>index.php/fifo/ambilBagIni',
            dataType: 'JSON',
            success: function() {
                $("#modalAmbilBagIni").modal('hide');
            }
        });
    }

    function disabled_tombol(ceklis) {
        if (ceklis.checked) {
            document.getElementById('submit_button').disabled = false;
        } else {
            document.getElementById('submit_button').disabled = true;
        }
    }

    function disabledButton() {
        const qty_checker = parseInt(document.getElementById("qty_checker").value);
        const qty = parseInt(document.getElementById("qty").value);
        // console.log(qty_checker);

        if (qty_checker > qty) {
            document.getElementById("tombol-ambil").disabled = true;
        } else if (qty_checker < 0) {
            document.getElementById("tombol-ambil").disabled = true;
        } else if (qty_checker == '') {
            document.getElementById("tombol-ambil").disabled = true;
        } else {
            document.getElementById("tombol-ambil").disabled = false;
        }
    }


    // panggil fungsi otomatis saat page ini diload

    // function convertDateTimeDBtoIndo(string) {
    //     bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    //     tanggal = string.split("-")[2];
    //     bulan = string.split("-")[1];
    //     tahun = string.split("-")[0];

    //     return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
    // }


    // function submit(x) {
    //     $.ajax({
    //         type: "POST",
    //         data: 'id_pallet=' + x,
    //         url: '<?php echo base_url(); ?>index.php/fifo/ambilIDPallet',
    //         dataType: 'json',
    //         success: function(hasil) {
    //             // console.log(hasil);
    //             // kirim data ke modal Qty
    //             // $('[name="nomor_do"]').val(hasil[0].nomor_do);
    //             $('[name="nomor_po"]').val(hasil[0].nomor_po);
    //             $('[name="id_pallet"]').val(hasil[0].id_pallet);
    //             $('[name="kode_pakan"]').val(hasil[0].kode_pakan);
    //             $('[name="lokasi_gudang"]').val(hasil[0].lokasi_gudang);
    //             $('[name="waktu_pembuatan"]').val(hasil[0].waktu_pembuatan);
    //             $('[name="expired_date"]').val(hasil[0].expired_date);
    //             $('[name="qty"]').val(hasil[0].qty);

    //             $('[class="qty"]').html(hasil[0].qty);

    //             // membatasi inputan qty sesuai dengan stock
    //             var batas = hasil[0].qty
    //             document.getElementById("qty").max = batas;
    //             document.getElementById("qty").min = 1;
    //         }
    //     });
    // } 

    // var pakan_terpilih = document.getElementById('pakan_terpilih')
    // $(document).ready(function() {
    //     setInterval(function() {
    //         $.ajax({
    //             url: "<?php echo base_url(); ?>index.php/fifo/pakan_terpilih",
    //             method: "POST",
    //             data: {
    //                 nomor_do: <?= $nomor_do; ?>
    //             },
    //             dataType: 'json',
    //             success: function(data) {
    //                 //console.log(data);
    //                 pakan_terpilih.innerHTML = "";
    //                 if (data == false) {
    //                     pakan_terpilih.innerHTML += "<div class='alert alert-danger' role='alert'>Belum ada pakan yang terpilih</div>";
    //                 } else {
    //                     $.each(data, function(key, val) {
    //                         pakan_terpilih.innerHTML += "<div class='alert alert-primary' role='alert'>Kode Pakan : " + val.kode_pakan + " || Qty : " + val.qty + " || Lokasi : " + val.lokasi_gudang + "</div>";
    //                     });
    //                 }
    //             }
    //         });

    //     }, 1000);
    // });
</script>