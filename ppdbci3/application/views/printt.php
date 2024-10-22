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

    <!-- Custom styles for this page -->
    <link
        href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>"
        rel="stylesheet" />
</head>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Container for the KTP card */
        .ktp-card {
            border: 2px solid #007bff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            background-color: #f8f9fa;
        }

        /* Title Styling */
        .ktp-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            letter-spacing: 1px;
            /* For better spacing */
        }

        /* Styling for the round image */
        .ktp-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: inherit;
            /* Makes sure the image fits perfectly inside the circle */
            border: 3px solid #007bff;
            /* Adds a border around the photo */
        }

        /* Labels for each data item */
        .ktp-label {
            font-weight: 600;
            /* Slightly bolder */
            font-size: 14px;
            color: #333;
        }

        /* Values for each data item */
        .ktp-value {
            font-size: 14px;
            color: #555;
        }

        /* Adjusting the row spacing */
        .table-borderless tr {
            padding-bottom: 10px;
        }

        /* Print styles */
        @media print {
            .btn {
                display: none;
                /* Hides the print button */
            }

            .ktp-card {
                border: 1px solid black;
                box-shadow: none;
            }

            .ktp-card {
                border: 2px solid #007bff;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                padding: 20px;
                background-color: #f8f9fa;
            }

            /* Title Styling */
            .ktp-title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
                letter-spacing: 1px;
                /* For better spacing */
            }

            /* Styling for the round image */
            .ktp-img {
                width: 120px;
                height: 120px;
                border-radius: 50%;
                object-fit: inherit;
                /* Makes sure the image fits perfectly inside the circle */
                border: 3px solid #007bff;
                /* Adds a border around the photo */
            }

            /* Labels for each data item */
            .ktp-label {
                font-weight: 600;
                /* Slightly bolder */
                font-size: 14px;
                color: #333;
            }

            /* Values for each data item */
            .ktp-value {
                font-size: 14px;
                color: #555;
            }

            /* Adjusting the row spacing */
            .table-borderless tr {
                padding-bottom: 10px;
            }

        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="ktp-card">
            <h5 class="ktp-title text-center">Kartu Identitas Siswa</h5>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="ktp-label">No Pendaftaran</td>
                                <td class="ktp-value"><?= $siswa['no_daftar']; ?></td>
                            </tr>
                            <tr>
                                <td class="ktp-label">NISN</td>
                                <td class="ktp-value"><?= $siswa['nisn']; ?></td>
                            </tr>
                            <tr>
                                <td class="ktp-label">Nama</td>
                                <td class="ktp-value"><?= $siswa['nama']; ?></td>
                            </tr>
                            <tr>
                                <td class="ktp-label">Tanggal Lahir</td>
                                <td class="ktp-value"><?= $siswa['tgl_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td class="ktp-label">Jenis Kelamin</td>
                                <td class="ktp-value"><?= $siswa['jk']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 text-center">
                    <img src="<?= base_url('assets/uploads/' . $siswa['foto']); ?>" alt="Foto Siswa" class="ktp-img">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="ktp-label">Alamat</td>
                                <td class="ktp-value"><?= $siswa['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td class="ktp-label">Sekolah Asal</td>
                                <td class="ktp-value"><?= $siswa['sekolah_asal']; ?></td>
                            </tr>
                            <tr>
                                <td class="ktp-label">No Telepon</td>
                                <td class="ktp-value"><?= $siswa['nope']; ?></td>
                            </tr>
                            <tr>
                                <td class="ktp-label">Email</td>
                                <td class="ktp-value"><?= $siswa['email']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br>

        <button class="btn btn-primary" onclick="window.print()">Cetak</button>
    </div>
</body>

</html>

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