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
                            <li>Hasil pencarian teratas adalah pallet tertua</li>
                            <li>Klik tombol <strong>PILIH</strong> </li>
                            <li>Masukkan jumlah bag yang akan diambil</li>
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
                                Kode Pakan : <?php echo $dc['kode_pakan']; ?> || Qty : <?php echo $dc['qty']; ?> || Lokasi : <?php echo $dc['lokasi_gudang']; ?>
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
                            <th>Tanggal Produksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="target">
                        <!-- dikirim data pake JSON -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Input Jumlah Bag  -->
<div class="modal fade" id="qtyBagModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukan Jumlah Bag </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- gadipake karena kan pake AJAX untuk kirim data -->
                <!-- <form method="POST" action="<?= base_url('fifo/checker_ok') ?>"> -->
                <form method="POST" action="">
                    <div class="form-group">
                        <h5> <strong>Stock : <span class="qty"></span></strong> </h5>
                        <label for="recipient-name" class="col-form-label">Ambil : </label>

                        <!-- disini ada 2 id non unique yaitu nomor DO -->
                        <input type="hidden" class="form-control" id="nomor_do" name="nomor_do" value="<?= $nomor_do; ?>">

                        <input type="hidden" class="form-control" id="nomor_po" name="nomor_po">

                        <input type="hidden" class="form-control" id="id_pallet" name="id_pallet">

                        <input type="hidden" class="form-control" id="kode_pakan" name="kode_pakan">

                        <input type="hidden" class="form-control" id="lokasi_gudang" name="lokasi_gudang">

                        <input type="hidden" class="form-control" id="waktu_pembuatan" name="waktu_pembuatan">

                        <input type="hidden" class="form-control" id="expired_date" name="expired_date">

                        <input type="hidden" class="form-control" id="waktu_checker" name="waktu_checker" value="<?php date_default_timezone_set("Asia/Jakarta");
                                                                                                                    echo date("Y-m-d H:i:s");  ?>" readonly>

                        <input type="number" class="form-control" id="qty" name="qty" autocomplete="off" required>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <!-- fungsi ambilBag belum dibuat -->
                        <button type="submit" class="btn btn-primary" onclick="updateStokGudang()">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>

<script>
    // panggil fungsi otomatis saat page ini diload
    ambilData();

    function convertDateTimeDBtoIndo(string) {
        bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        tanggal = string.split("-")[2];
        bulan = string.split("-")[1];
        tahun = string.split("-")[0];

        return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
    }

    //fungsi untuk tampilkan pilihan stock pakan di gudang 
    function ambilData() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>fifo/checker2',
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                // untuk tampil data di tabel pilih pakan
                var baris = '';

                for (var i = 0; i < data.length; i++) {
                    var tanggal = convertDateTimeDBtoIndo(data[i].waktu_pembuatan);
                    baris += '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td>' + data[i].kode_pakan + '</td>' +
                        '<td>' + data[i].qty + '</td>' +
                        '<td>' + data[i].lokasi_gudang + '</td>' +
                        '<td>' + tanggal + '</td>' +

                        // button panggil modal dengan id_pallet
                        '<td>' + '<a href="" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#qtyBagModal" onclick="submit(' + data[i].id_pallet + ')"> <span class="icon text-white-50"><i class="fas fa-dolly"></i></span><span class="text">Pilih</span></a>' + '</td>' +

                        '</tr>';
                }
                $('#target').html(baris);
            }
        })
    }

    function submit(x) {
        $.ajax({
            type: "POST",
            data: 'id_pallet=' + x,
            url: '<?php echo base_url(); ?>index.php/fifo/ambilIDPallet',
            dataType: 'json',
            success: function(hasil) {
                // console.log(hasil);
                // kirim data ke modal Qty
                // $('[name="nomor_do"]').val(hasil[0].nomor_do);
                $('[name="nomor_po"]').val(hasil[0].nomor_po);
                $('[name="id_pallet"]').val(hasil[0].id_pallet);
                $('[name="kode_pakan"]').val(hasil[0].kode_pakan);
                $('[name="lokasi_gudang"]').val(hasil[0].lokasi_gudang);
                $('[name="waktu_pembuatan"]').val(hasil[0].waktu_pembuatan);
                $('[name="expired_date"]').val(hasil[0].expired_date);
                $('[name="qty"]').val(hasil[0].qty);

                $('[class="qty"]').html(hasil[0].qty);

                // membatasi inputan qty sesuai dengan stock
                var batas = hasil[0].qty
                document.getElementById("qty").max = batas;
                document.getElementById("qty").min = 1;
            }
        });
    }

    function updateStokGudang() {
        var nomor_do = $("[name='nomor_do']").val();
        var nomor_po = $("[name='nomor_po']").val();
        var id_pallet = $("[name='id_pallet']").val();
        var kode_pakan = $("[name='kode_pakan']").val();
        var lokasi_gudang = $("[name='lokasi_gudang']").val();
        var waktu_pembuatan = $("[name='waktu_pembuatan']").val();
        var expired_date = $("[name='expired_date']").val();
        var waktu_checker = $("[name='waktu_checker']").val();
        var qty = $("[name='qty']").val();

        $.ajax({
            type: 'POST',
            data: 'nomor_do=' + nomor_do + '&nomor_po=' + nomor_po + '&id_pallet=' + id_pallet + '&kode_pakan=' + kode_pakan + '&lokasi_gudang=' + lokasi_gudang + '&waktu_pembuatan=' + waktu_pembuatan + '&expired_date=' + expired_date + '&waktu_checker=' + waktu_checker + '&qty=' + qty,
            url: '<?= base_url() ?>index.php/fifo/checker_ok',
            dataType: 'JSON',
            success: function() {
                $("#qtyBagModal").modal('hide');
                ambilData();
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
</script>
<script>
    var pakan_terpilih = document.getElementById('pakan_terpilih')
    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/fifo/pakan_terpilih",
                method: "POST",
                data: {
                    nomor_do: <?= $nomor_do; ?>
                },
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    pakan_terpilih.innerHTML = "";
                    if (data == false) {
                        pakan_terpilih.innerHTML += "<div class='alert alert-danger' role='alert'>Belum ada pakan yang terpilih</div>";
                    } else {
                        $.each(data, function(key, val) {
                            pakan_terpilih.innerHTML += "<div class='alert alert-primary' role='alert'>Kode Pakan : " + val.kode_pakan + " || Qty : " + val.qty + " || Lokasi : " + val.lokasi_gudang + "</div>";
                        });
                    }
                }
            });

        }, 1000);
    });
</script>