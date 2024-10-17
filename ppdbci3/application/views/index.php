<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PPDB - Beranda</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "template/nav.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "template/topbar.php" ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-block align-items-center mb-4">
                        <h1 class="h3 mb-0 text-gray-900 d-block">Dashboard</h1>
                        <br>
                        <h5 class="h5 mb-0 text-gray-800">Kamu login sebagai <?= $level; ?></h5>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Siswa</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total ?> Siswa</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-2x text-gray-500"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <?php if ($level === 'admin') : ?>
                            <div class="col-xl-5 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total Petugas</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">2 Petugas</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-tie fa-2x text-gray-500"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Content Row -->

                        <div class="row">
                            <div class="container-fluid">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Tabel Calon Siswa</h6>
                                    </div>

                                    <!-- Tombol Tambah Data, Cetak PDF, dan Cetak Excel -->
                                    <div class="card-body">
                                        <div class="mb-3">

                                            <?php if ($level == 'admin' || $level == 'petugas') : ?>
                                                <a href="<?= site_url('admin/siswa/tambah') ?>" class="btn btn-primary">
                                                    <i class="fas fa-plus"></i> Tambah Data
                                                </a>

                                                <a href="<?= site_url('admin/siswa/cetak_pdf') ?>" class="btn btn-secondary">
                                                    <i class="fas fa-file-pdf"></i> Cetak PDF
                                                </a>
                                                <a href="<?= site_url('admin/siswa/cetak_excel') ?>" class="btn btn-info">
                                                    <i class="fas fa-file-excel"></i> Cetak Excel
                                                </a>
                                            <?php endif; ?>

                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NISN</th>
                                                        <th>NAMA</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Alamat</th>
                                                        <th>Sekolah Asal</th>
                                                        <th>Foto</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($siswa as $s): ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $s['nisn'] ?></td>
                                                            <td><?= $s['nama'] ?></td>
                                                            <td><?= $s['jk'] ?></td>
                                                            <td><?= $s['alamat'] ?></td>
                                                            <td><?= $s['sekolah_asal'] ?></td>
                                                            <td>
                                                                <?php if (!empty($s['foto'])): ?>
                                                                    <img src="<?= base_url('assets/uploads/' . $s['foto']) ?>" alt="Foto Siswa"
                                                                        width="80" class="img-thumbnail">
                                                                <?php else: ?>
                                                                    <span class="text-danger">Tidak ada foto</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($level == 'admin' || $level == 'petugas') : ?>

                                                                    <a href="<?= site_url('SiswaController/edit/' . $s['no_daftar']) ?>"
                                                                        class="btn btn-sm btn-primary">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </a>
                                                                    <a href="<?= site_url('SiswaController/delete/' . $s['no_daftar']) ?>"
                                                                        class="btn btn-sm btn-danger"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                                    </a>
                                                                <?php endif; ?>


                                                                <a href="<?= site_url('SiswaController/detail/' . $s['no_daftar']) ?>"
                                                                    class="btn btn-sm btn-success">
                                                                    <i class="fas fa-print"></i> Detail
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; PPDB SMKN 1 Gantar 2021</span>
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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>
        <script src="<?= base_url('assets/js/demo/chart-pie-demo.js'); ?>"></script>

</body>

</html>