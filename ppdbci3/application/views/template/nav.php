<style>
    /* Agar sidebar tetap terlihat saat di-scroll */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        z-index: 999;
        overflow-y: auto;
        /* Agar bisa di-scroll jika tinggi konten melebihi layar */
        width: 27%;
        /* Lebar default sidebar */
    }

    /* Sidebar default disembunyikan di layar kecil */
    @media (max-width: 768px) {
        .sidebar {
            display: none;
            /* Sembunyikan sidebar */
        }

        .sidebar.show {
            display: block;
            /* Tampilkan sidebar jika memiliki kelas 'show' */
        }
    }
</style>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <button id="sidebarToggleTop" class="btn d-md-none rounded-circle ms-2 mt-3" style="color: white;">
        <i class="fa fa-bars"></i>
    </button>

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text">PPDB SMKN 1 Gantar<sup></sup></div>
        <!-- Sidebar Toggle (Topbar) -->

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#tabel-siswa">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Siswa</span></a>
    </li>



    <!-- Divider -->
    <?php if ($this->session->userdata('level') === 'admin'): ?>
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="admin/daftarPetugas" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-user-plus"></i>
                <span>Tambah Petugas</span>
            </a>
        </li>
    <?php endif; ?>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Lainnya
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Log Out</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->