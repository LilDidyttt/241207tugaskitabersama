<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            /* Allows wrapping of items */
            margin-bottom: 15px;
        }

        .form-group {
            flex: 1;
            margin-right: 15px;
            width: 50%;
            /* Set to 50% for two inputs side by side */
        }

        .form-group:last-child {
            margin-right: 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        textarea {
            height: 100px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #2980b9;
        }

        .image-preview {
            margin-top: 15px;
        }

        .image-preview img {
            max-width: 100%;
            /* Ensures image is responsive */
            height: auto;
            /* Maintains aspect ratio */
            border: 1px solid #ddd;
            /* Optional border for image */
        }

        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
            }

            .form-group {
                margin-right: 0;
                margin-bottom: 15px;
                width: 100%;
                /* Full width on smaller screens */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Form Tambah Siswa</h2>
        <form action="<?= site_url('SiswaController/update/' . $siswa['no_daftar']) ?>" method="post"
            enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" name="nisn" id="nisn" class="form-control" value="<?= $siswa['nisn'] ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $siswa['nama'] ?>"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                        value="<?= $siswa['tgl_lahir'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control">
                        <option value="Laki - laki" <?= $siswa['jk'] == 'Laki - laki' ? 'selected' : '' ?>>Laki-laki
                        </option>
                        <option value="Perempuan" <?= $siswa['jk'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" required><?= $siswa['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="sekolah_asal">Sekolah Asal</label>
                    <input type="text" name="sekolah_asal" id="sekolah_asal" class="form-control"
                        value="<?= $siswa['sekolah_asal'] ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="nope">Nomor HP</label>
                    <input type="text" name="nope" id="nope" class="form-control" value="<?= $siswa['nope'] ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $siswa['email'] ?>"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                    <div class="image-preview">
                        <?php if ($siswa['foto']): ?>
                            <img src="<?= base_url('assets/uploads/' . $siswa['foto']) ?>" alt="Foto Siswa">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>