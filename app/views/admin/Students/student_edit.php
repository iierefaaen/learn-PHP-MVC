<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Mahasiswa</h4>
        </div>

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="card-body text-center">
                    <img src="<?= $data["student"]["foto"]; ?>"
                    class="rounded-circle border border-3 border-primary d-block mx-auto my-4"
                    style="width: 120px; height: 120px; object-fit: cover;"
                    alt="Foto Mahasiswa">
                </div>

                <div class="card-body mx-5">

                    <div class="mb-3">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <input value="<?= $data["student"]["nama"]; ?>" type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                

                    <div class="mb-3">
                        <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                        <input value="<?= $data["student"]["nim"]; ?>" type="text" class="form-control" id="nim" name="nim" required>
                    </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="2"><?= $data["student"]["alamat"]; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="kota" class="form-label">Kota</label>
                    <input value="<?= $data["student"]["kota"]; ?>" type="text" class="form-control" id="kota" name="kota">
                </div>

                <div class="mb-3">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <input value="<?= $data["student"]["provinsi"]; ?>" type="text" class="form-control" id="provinsi" name="provinsi">
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input value="<?= $data["student"]["telepon"]; ?>" type="text" class="form-control" id="telepon" name="telepon">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="<?= $data["student"]["email"]; ?>" type="email" class="form-control" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input value="<?= $data["student"]["jurusan"]; ?>" type="text" class="form-control" id="jurusan" name="jurusan">
                </div>

                <div class="mb-3">
                    <label for="angkatan" class="form-label">Angkatan</label>
                    <input value="<?= $data["student"]["angkatan"]; ?>" type="number" class="form-control" id="angkatan" name="angkatan" min="2000" max="2099">
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option <?= $data["student"]["jenis_kelamin"] === "Laki-laki" ? 'selected' : ""; ?> value="Laki-laki">Laki-laki</option>
                    <option <?= $data["student"]["jenis_kelamin"] === "Perempuan" ? 'selected' : ""; ?> value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input value="<?= $data["student"]["tanggal_lahir"]; ?>" type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                </div>

                <div class="mb-3">
                    <label for="jenjang" class="form-label">Jenjang</label>
                    <select class="form-select" id="jenjang" name="jenjang">
                    <option <?= $data["student"]["jenjang"] === "D1" ? 'selected' : ""; ?> value="D1">D1</option>
                    <option <?= $data["student"]["jenjang"] === "D3" ? 'selected' : ""; ?> value="D3">D3</option>
                    <option <?= $data["student"]["jenjang"] === "D4" ? 'selected' : ""; ?> value="D4">D4</option>
                    <option <?= $data["student"]["jenjang"] === "S1" ? 'selected' : ""; ?> value="S1">S1</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" class="form-control" name="photo" id="fotoInput">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                    <option <?= $data['student']["status"] === 'Aktif' ? 'selected' : ''; ?> value="Aktif">Aktif</option>
                    <option <?= $data["student"]["status"] === "Cuti" ? 'selected' : ""; ?> value="Cuti">Cuti</option>
                    <option <?= $data["student"]["status"] === "Dropout" ? 'selected' : ""; ?> value="Dropout">Drop Out</option>
                    <option <?= $data["student"]["status"] === "Lulus" ? 'selected' : ""; ?> value="Lulus">Lulus</option>
                    </select>
                </div>
                </div>

                <div class="d-flex justify-content-center my-3">
                    <a class="btn btn-secondary" href="<?= BASE_URL ?>students">Batal</a>
                    <button name="edit" type="submit" class="ms-2 btn btn-primary">Edit Data</button>
                </div>
            </form>
        
    </div>
</div>