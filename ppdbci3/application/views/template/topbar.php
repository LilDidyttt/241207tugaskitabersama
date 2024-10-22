<style>
    /* Agar topbar tetap di atas */
    .navbar {
        position: sticky;
        top: 0;
        z-index: 998;
        /* Z-index yang tinggi agar tetap di atas elemen lain */
        width: 100vw;
        margin-left: 0vw;
    }

    /* Responsif untuk tampilan mobile */
    @media (max-width: 768px) {
        .navbar .breadcrumb {
            display: none;
            /* Sembunyikan breadcrumb di layar kecil */
        }

        .navbar-nav {
            display: flex;
            flex-direction: column;
            /* Biar topbar lebih mudah diakses di layar kecil */
        }

        .navbar .img-profile {
            width: 40px;
            height: 40px;
        }
    }
</style>

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
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-900 small">
                    <?php echo $this->session->userdata('nama'); ?>
                </span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/img-user.svg') ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-red-800"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->