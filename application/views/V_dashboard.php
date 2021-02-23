<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a> -->
    </div>

    <!-- flashdata kalau berhasil nambah -->
    <?php if ($this->session->flashdata('berhasil')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Input PO ke dalam sistem berhasil !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('berhasil-do')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Input DO ke dalam sistem berhasil !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pallet Terisi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $pallet_aktif; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-clipboard-check"></i> -->
                            <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pallet kosong
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $pallet_kosong; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-sticky-note fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah PO Aktif
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo $jumlah_po['result']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- DataTales Example -->
    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Stock Pakan (SOON PAKE CHART)
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jumlah_pakan as $jp) : ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $jp['kode_pakan']; ?> </td>
                                <td><?php echo $jp['jumlah']; ?> Bag</td>
                            </tr>
                        <?php
                            $no++;
                        endforeach; ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->


    <hr>

    <!-- Chart JS -->
    <script src="<?= base_url() ?>vendor/chartjs/Chart.js"></script>

    <center>
        <h3>Live Stock Pakan Gudang</h3>
    </center>

    <!-- <div class="container">
        <div class="row">
            <div class="col">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div> -->

    <div style="height: 350px; width: 1200px">
        <canvas id="myChart"></canvas>
    </div>

    <?php
    //    Inisilisasi variable awal
    $kode_pakan = "";
    $jumlah = null;
    foreach ($jumlah_pakan as $jp) {
        $kp = $jp['kode_pakan'];
        $kode_pakan .= "'$kp'" . ", ";
        $jum = $jp['jumlah'];
        $jumlah .= "'$jum'" . ", ";
    }
    ?>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', //jenis chartnya
            data: {
                // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                labels: [<?php echo $kode_pakan; ?>],
                // pengaturan datanya
                datasets: [{
                    label: 'Jumlah Pakan',
                    // data: [12, 19, 3, 23, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        // 'rgba(75, 192, 192, 0.2)',
                        // 'rgba(153, 102, 255, 0.2)',
                        // 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    data: [<?= $jumlah ?>],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'top',
                },
            }
        });
    </script>
</div>
</div>