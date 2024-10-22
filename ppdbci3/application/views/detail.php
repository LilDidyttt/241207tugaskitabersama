<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>PPDB - Detail Siswa</title>

    <!-- Custom fonts for this template-->
    <link
        href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>"
        rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link
        href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>"
        rel="stylesheet" />

    <link
        href="<?= base_url('assets/css/style.css'); ?>"
        rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link
        href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>"
        rel="stylesheet" />

    <style>
        #mainContent {
            margin-left: 15%;
        }

        .card {
            display: none;
        }

        @media print {

            #mainContent,
            footer,
            ul,
            li,
            .sidebar,
            a,
            button,
            .nav-samping,
            i,
            .sidebar-heading,
            .body-content {
                display: none;
            }

            .card {
                border: 1px solid #007bff;
                display: block;
                border-radius: 12px;
                text-align: center;
                padding: 20px;
                background-color: #ffffff;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
                width: 320px;
                margin: 20px auto;
                position: relative;
                overflow: hidden;
                transition: transform 0.3s ease;
            }

            .card:hover {
                transform: translateY(-5px);
            }

            .card img {
                max-width: 70%;
                border-radius: 10%;
                /* Adding border to image */
                margin-bottom: 15px;
                /* Space between image and text */
            }

            .card h2 {
                text-align: center;
                font-size: 22px;
                margin: 10px 0;
                color: #007bff;
                /* Changed text color */
                font-family: 'Arial', sans-serif;
            }

            .card p {
                margin: 5px 0;
                font-size: 14px;
                color: #555;
                /* Dark gray text for better readability */
                line-height: 1.5;
                /* Improved line spacing */
            }

            .card .info {
                margin: 10px 0;
                padding: 10px;
                background: linear-gradient(to right, #007bff, #00aaff);
                color: white;
                border-radius: 8px;
                text-align: center;
                font-weight: bold;
                /* Make it bolder */
            }

            button {
                display: block;
                margin: 20px auto;
                background-color: #007bff;
                color: white;
                border: none;
                padding: 12px 24px;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            button:hover {
                background-color: #0056b3;
                transform: scale(1.05);
                /* Slight scaling on hover */
            }

        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper" class="body-content">
        <!-- Sidebar -->
        <div class="nav-samping">
            <?php include "template/nav.php" ?>
        </div>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include "template/topbar.php" ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" id="mainContent">
                    <!-- Page Heading -->
                    <table class="table table-striped  table-bordered">
                        <tr>
                            <th>No Pendaftaran</th>
                            <td><?= $siswa['no_daftar']; ?></td>
                        </tr>
                        <tr>
                            <th>NISN</th>
                            <td><?= $siswa['nisn']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td><?= $siswa['nama']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td><?= $siswa['tgl_lahir']; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td><?= $siswa['jk']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?= $siswa['alamat']; ?></td>
                        </tr>
                        <tr>
                            <th>Sekolah Asal</th>
                            <td><?= $siswa['sekolah_asal']; ?></td>
                        </tr>
                        <tr>
                            <th>No Telepon</th>
                            <td><?= $siswa['nope']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $siswa['email']; ?></td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td><img src="<?= base_url('assets/uploads/' . $siswa['foto']); ?>" alt="Foto Siswa" style="max-width: 100px;"></td>
                        </tr>
                    </table>

                    <br>

                    <br>
                    <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'petugas') : ?>
                        <button class="btn btn-primary" onclick="window.print()">Cetak</button>
                    <?php endif; ?>
                    <a href="<?= base_url('/') ?>">
                        <button class="btn btn-warning">Kembali</button>
                    </a>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <div class="card">
        <h2>Kartu Identitas Siswa</h2>
        <img src="<?= base_url('assets/uploads/' . $siswa['foto']); ?>" alt="Foto Siswa">
        <p><strong>No Pendaftaran:</strong> <?= $siswa['no_daftar']; ?></p>
        <p><strong>NISN:</strong> <?= $siswa['nisn']; ?></p>
        <p><strong>Nama:</strong> <?= $siswa['nama']; ?></p>
        <p><strong>Tanggal Lahir:</strong> <?= $siswa['tgl_lahir']; ?></p>
        <p><strong>Jenis Kelamin:</strong> <?= $siswa['jk']; ?></p>
        <p><strong>Alamat:</strong> <?= $siswa['alamat']; ?></p>
        <p><strong>Sekolah Asal:</strong> <?= $siswa['sekolah_asal']; ?></p>
        <p><strong>No Telepon:</strong> <?= $siswa['nope']; ?></p>
        <p><strong>Email:</strong> <?= $siswa['email']; ?></p>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div
        class="modal fade"
        id="logoutModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button
                        class="close"
                        type="button"
                        data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button
                        class="btn btn-secondary"
                        type="button"
                        data-dismiss="modal">
                        Cancel
                    </button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>