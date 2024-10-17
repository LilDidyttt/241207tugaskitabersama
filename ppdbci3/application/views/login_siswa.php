<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PPDB - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-around">
                            <div class="col-lg-4 d-none d-lg-block ms-4 bg-login-image">
                                <img src="<?= base_url('assets/img/register.png') ?>" class="img-fluid mt-2"
                                    alt="Image Login">
                            </div>
                            <div class="col-lg-6 mt-5">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Sebagai Siswa!</h1>
                                    </div>

                                    <!-- Menampilkan Flash Data (Pesan Error/Sukses) -->
                                    <?php if ($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                    <?php elseif ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php endif; ?>
                                    <!-- End Flash Data -->

                                    <!-- Form Login -->
                                    <form class="user" action="<?php echo site_url('authsiswa/login_process'); ?>"
                                        method="post">
                                        <!-- Input NISN -->
                                        <div class="form-group">
                                            <input type="text" name="nisn" class="form-control form-control-user"
                                                id="nisn" placeholder="NISN" required>
                                        </div>

                                        <!-- Input Tanggal Lahir -->
                                        <div class="form-group">
                                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                                class="form-control form-control-user" required>
                                        </div>

                                        <!-- Checkbox Remember Me -->
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>

                                        <!-- Button Login -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block"
                                            style="font-size: 1.2rem;">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <!-- End of Form Login -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>