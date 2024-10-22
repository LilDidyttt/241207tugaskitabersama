<html><head>
    <title></title>
    <style>
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th {
            text-align: center;
            padding: 12px;
        }

        table, th, td {
            border: 1px solid black;
        }
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head><body>
    <h2 style="text-align:center;">Laporan Calon Peserta Didik Baru</h2>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
        <th>No</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Sekolah Asal</th>
        <th>Nomor HP</th>
        <th>Email</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($siswa as $s) {
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $s['nisn'] ?></td>
                <td><?= $s['nama'] ?></td>
                <td><?= $s['tgl_lahir'] ?></td>
                <td><?= $s['alamat'] ?></td>
                <td><?= $s['sekolah_asal'] ?></td>
                <td><?= $s['nope'] ?></td>
                <td><?= $s['email'] ?></td>
            </tr>
            <?php
        } ?>
    </table>
    <p>Total siswa: <?= $total_siswa ?></p>
</body></html>