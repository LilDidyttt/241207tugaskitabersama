<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Data Calon Peserta Didik</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Sekolah Asal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($siswa as $s): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $s['nisn'] ?></td>
                    <td><?= $s['nama'] ?></td>
                    <td><?= $s['jk'] ?></td>
                    <td><?= $s['alamat'] ?></td>
                    <td><?= $s['sekolah_asal'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>