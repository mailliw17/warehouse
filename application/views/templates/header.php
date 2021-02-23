<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>
        <?php if (!empty($page_title)) echo $page_title; ?>
    </title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?= base_url() ?>vendor/sbadmin2/font.css" rel="stylesheet" /> -->

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>vendor/sbadmin2/css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Datepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- Custom styles for this page -->
    <link href="<?= base_url() ?>vendor/sbadmin2/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <div class="sidebar-brand-text mx-3"> <small>Warehouse Management System</small></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Menu Utama</div>

            <!-- Nav Item - Dashboard -->

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider" />

            <?php if (($this->session->userdata('role') == 'Admin') || ($this->session->userdata('role') == 'Operator Packing')) : ?>

                <div class="sidebar-heading">QR Pallet</div>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>inputpo/scan">
                        <i class="fas fa-folder-plus"></i>
                        <span>Input Nomor PO <small>(Kamera)</small></span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>inputpo/handheld">
                        <i class="fas fa-folder-plus"></i>
                        <span>Input Nomor PO <small>(Hand Held)</small></span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>kodeqr">
                        <i class="fas fa-qrcode"></i>
                        <span>Cetak QR Pallet</span></a>
                </li>

                <hr class="sidebar-divider" />
            <?php endif; ?>

            <?php if (($this->session->userdata('role') == 'Admin') || ($this->session->userdata('role') == 'Juru Muat')) : ?>
                <div class="sidebar-heading">FIFO Pallet</div>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>fifo">
                        <i class="fas fa-boxes"></i>
                        <span>FIFO Pallet (Forklift)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>inputdo">
                        <i class="fas fa-truck-loading"></i>
                        <span>Barang Muat Truk (DO)</span></a>
                </li>

                <hr class="sidebar-divider" />
            <?php endif; ?>



            <!-- Heading -->
            <div class="sidebar-heading">Tambahan</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url() ?>kodepakan">
                    <i class="fas fa-list-ol"></i>
                    <span>Kode Pakan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url() ?>kodeqr/scandeteksi">
                    <i class="fas fa-search"></i>
                    <span>Deteksi Pallet (Kamera)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url() ?>kodeqr/scandeteksi_handheld">
                    <i class="fas fa-search"></i>
                    <span>Deteksi Pallet (Hand Held)</span>
                </a>
            </li>

            <hr class="sidebar-divider" />




            <?php if (($this->session->userdata('role') == 'Admin') || ($this->session->userdata('role') == 'Juru Muat')) : ?>

                <div class="sidebar-heading">Tambahan</div>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>pelanggan">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Daftar Pelanggan</span></a>
                </li>
                <hr class="sidebar-divider" />
            <?php endif; ?>

            <?php if ($this->session->userdata('role') == 'Admin') : ?>
                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>auth/register">
                        <i class="fas fa-user-plus"></i>
                        <span>Daftar Akun Baru</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url() ?>auth/kelolaakun">
                        <i class="fas fa-user-cog"></i>
                        <span>Pengaturan Akun Operator</span>
                    </a>
                </li>

                <hr class="sidebar-divider" />
            <?php endif; ?>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block" /> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo <strong> <?= $this->session->userdata('nama'); ?></strong> ! Anda login sebagai <strong> <?php echo $this->session->userdata('role'); ?> </strong></span>
                                <i class="far fa-user"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>auth/gantipassword">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ganti Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->