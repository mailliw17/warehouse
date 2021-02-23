<div class="form-group">
    <form action="" method="POST" name="add_name" id="add_name">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Barang Masuk Truk</h1>
                <div class="form-group col-md-3">
                    <label for="idpallet">Nomor DO</label>
                    <input type="text" class="form-control" id="nomor_do" name="nomor_do" autocomplete="off">
                </div>


                <div class="form-group col-md-3">
                    <label for="waktu">Pelanggan</label>
                    <input type="text" class="form-control" id="pelanggan" name="pelanggan" required autocomplete="off">
                </div>

                <div class="form-group col-md-2">
                    <label for="waktu">Plat Nomor</label>
                    <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" required autocomplete="off">
                </div>

                <div class="form-group col-md-2">
                    <label for="waktu">Tanggal</label>
                    <input type="text" class="form-control" id="tanggal" name="tanggal">
                    <div class="input-group-append"></div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <h4>Total Bag :</h4>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control total_harga" id="total_bag" name="total_bag" readonly placeholder="Otomatis dihitung sistem..." onchange="sum_all()">
                    </div>
                </div>
            </div>

            <!-- Tombol Tambah dan Kurang Baris -->
            <div class="row">
                <div class="form-group col-md-1">
                    <button type="button" class="btn btn-primary btn-sm" id="add" onclick="tambahbaris()">
                        <i class="fas fa-plus"></i>
                        <small>Tambah</small>
                    </button>
                </div>

                <div class="form-group col-md-1">
                    <button type="button" class="btn btn-danger btn-sm" id="minus" onclick="hapusbaris(current_rowid)">
                        <i class="fas fa-minus"></i>
                        Hapus
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="dynamic_field">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Pallet</th>
                            <th>Kode Pakan</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody id="tblbody">
                        <tr id="tblrow-1">
                            <td>
                                <input type="text" class="form-control name_list" name="id_pallet[]" id="id_pallet_1">
                            </td>
                            <td>
                                <input type="text" class="form-control name_list" id="kode_pakan_1" name="kode_pakan[]" required autocomplete="off" readonly>
                            </td>
                            <td>
                                <input type="number" class="form-control name_list" name="qty[]" id="qty_1" onkeyup="sum();" value="56">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- </div> -->
            <!-- </div> -->
            <!-- <div class="form-row">
                <div class="form-group col-md-10 mx-auto">
                    <input type="text" class="form-control" id="total_harga" name="total_harga" value="" placeholder="Total Harga..." readonly>
                </div>
            </div> -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="ceklis" onclick="disabled_tombol(this)">
                <label class="form-check-label" for="exampleCheck1">Transaksi yang dibuat sudah cocok</label>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" id="submit_button" class="btn btn-facebook btn-block" disabled>SELESAI</button>
                </div>
            </div>
    </form>
</div>
</div>
</div>

<!-- <script>
    $('.sub_total').change(function() {
        var sumdata = 0;
        $('.sub_total').each(function() {
            if ($(this).val() != "") {
                sumdata += parseInt($(this).val());
            }
        });
        $('#total_harga').html(sumdata);
    });
</script> -->

<script>
    var last_tableid = 1;
    var current_tableid = 1;
    var current_rowid = 1;
    var total_row = 1; //kalo perlu, silahkan uncomment

    function create_input(type, name, id) {
        var result = document.createElement("INPUT");
        result.type = type;
        result.name = name;
        result.id = id;
        return result;
    }

    function create_input_disabled(type, name, id, disabled) {
        var result = document.createElement("INPUT");
        result.type = type;
        result.name = name;
        result.id = id;
        result.disabled = disabled;
        return result;
    }

    // function create_input_autosum(type, name, id, disabled, sum) {
    //     var result = document.createElement("INPUT");
    //     result.type = type;
    //     result.name = name;
    //     result.id = id;
    //     result.disabled = disabled;
    //     result.sum = sum;
    //     return result;
    // }

    function create_input2(name, id) {
        var result = document.createElement("INPUT");
        result.name = name;
        result.id = id;
        return result;
    }

    function create_action(id, onclick, value) {
        var result = document.createElement("A");
        var text = document.createTextNode(value);
        result.id = id;
        result.setAttribute('onclick', onclick);
        result.href = '#';
        result.appendChild(text);
        return result;
    }

    function tambahbaris() {
        current_rowid++;
        var tblbody = document.getElementById('tblbody');
        var elm_tr = document.createElement("TR");
        var elm_td1 = document.createElement("TD");
        var elm_td2 = document.createElement("TD");
        var elm_td3 = document.createElement("TD");
        var elm_td4 = document.createElement("TD");
        var elm_td5 = document.createElement("TD");
        elm_td1.appendChild(create_input_disabled('text', 'id_barang[]', 'id_barang_' + current_rowid, 'disabled'));
        elm_td2.appendChild(create_input2('nama_barang[]', 'nama_barang_' + current_rowid));
        elm_td3.appendChild(create_input('number', 'qty[]', 'qty_' + current_rowid));
        elm_td4.appendChild(create_input_disabled('text', 'harga_satuan[]', 'harga_satuan_' + current_rowid, 'disabled'));
        elm_td5.appendChild(create_input_disabled('text', 'sub_total[]', 'sub_total_' + current_rowid, 'disabled'));
        elm_tr.id = 'tblrow_' + current_rowid;
        elm_tr.appendChild(elm_td1);
        elm_tr.appendChild(elm_td2);
        elm_tr.appendChild(elm_td3);
        elm_tr.appendChild(elm_td4);
        elm_tr.appendChild(elm_td5);
        tblbody.appendChild(elm_tr);

        document.getElementById('id_barang_' + current_rowid).className = "form-control name_list";
        document.getElementById('nama_barang_' + current_rowid).className = "form-control name_list";
        document.getElementById('qty_' + current_rowid).className = "form-control name_list";
        document.getElementById('harga_satuan_' + current_rowid).className = "form-control name_list";
        document.getElementById('sub_total_' + current_rowid).className = "form-control name_list";

        var id_barang = 'id_barang_' + current_rowid;
        var harga_satuan = 'harga_satuan_' + current_rowid;
        document.getElementById('nama_barang_' + current_rowid).setAttribute('list', 'nama_barang_dropdown');
        document.getElementById('nama_barang_' + current_rowid).setAttribute("onchange", "autoFill(this.value, '" + id_barang + "' , '" + harga_satuan + "')");
        // ini mau buat fungsi sum
        document.getElementById('qty_' + current_rowid).setAttribute("onkeyup", "sum()");
        document.getElementById('harga_satuan_' + current_rowid).setAttribute("onchange", "sum()");
    }

    function hapusbaris() {
        //kalo perlu, silahkan uncomment
        var tblrow = document.getElementById('tblrow_' + current_rowid);
        tblrow.remove();
        current_rowid--;
    }

    function sum() {
        var a = $("#qty_" + current_rowid).val();
        var b = $("#harga_satuan_" + current_rowid).val();
        c = a * b;
        $("#sub_total_" + current_rowid).val(c);
    }

    // fungsi hitung seluruh total harga
    function sum_all() {
        var a = $("#sub_total_1").val();
        alert(a);
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
    function autoFill(value, barang, harga_satuan) {
        var nama_barang = value;
        var barang = document.getElementById(barang);
        var harga_satuan = document.getElementById(harga_satuan);

        $.ajax({
            url: "<?php echo base_url(); ?>index.php/transaksi/get_data_barang",
            method: "POST",
            data: {
                nama_barang: nama_barang
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data != false) { // nim ditemukan
                    $.each(data, function(key, val) {
                        barang.value = val.id_barang;
                        harga_satuan.value = val.harga_satuan;
                    });
                } else {
                    console.log('Tidak ditemukan');
                    barang.value = '';
                    harga_satuan.value = '';
                }

            }
        });
    }
</script>