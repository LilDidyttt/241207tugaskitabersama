<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PPDB - Daftar Baru Petugas</title>

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


        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-7 mt-4">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Baru Petugas</h1>
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


                            <form class="user" method="post" action="<?= base_url('UserController/addNewPetugas') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nama" id="exampleFirstName"
                                        placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username" id="exampleInputEmail"
                                        placeholder="Username">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" name="konfir-password" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                                <input type="submit" name="daftarPetugas" class="btn btn-primary btn-user btn-block" value="Daftar Petugas" style="font-size: 1.1rem;">
                            </form>
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-lg-block bg-register-image"> <img
                            src="<?= base_url('assets/img/login.png') ?>" class="img-fluid mt-3" alt="Image Login">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>

</body>

</html>