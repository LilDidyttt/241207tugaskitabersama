<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" />
</head>

<body id="page-top">

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
                                <img src="<?= base_url('assets/uploads/' . $s['foto']) ?>" alt="Foto Siswa" width="50"
                                    class="img-thumbnail">
                            <?php else: ?>
                                <span class="text-danger">Tidak ada foto</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= site_url('SiswaController/edit/' . $s['no_daftar']) ?>"
                                class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= site_url('SiswaController/delete/' . $s['no_daftar']) ?>"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </a>


                            <a href="<?= site_url('SiswaController/detail/' . $s['no_daftar']) ?>"
                                class="btn btn-sm btn-success">
                                <i class="fas fa-print"></i> Detail
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>




</body>

</html>

</html>