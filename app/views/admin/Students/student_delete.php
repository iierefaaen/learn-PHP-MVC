<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Student Detail</h4>
        </div>

        <div class="card-body text-center">
            <img src="path/to/foto.jpg"
            class="rounded-circle border border-3 border-primary d-block mx-auto my-4"
            style="width: 120px; height: 120px; object-fit: cover;"
            alt="Foto Mahasiswa">
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["nama"]; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">NIM</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["nim"]; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["jenis_kelamin"]; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["tanggal_lahir"]; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["alamat"]; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Kota</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["kota"]; ?></p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Provinsi</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["provinsi"]; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Program Studi</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["jurusan"]; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Jenjang</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["jenjang"]; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Angkatan</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["angkatan"]; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext text-success"><?= $data["student"]["status"]; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Telepon</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["telepon"]; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["email"]; ?></p>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="<?= BASE_URL; ?>students" class="btn btn-secondary">Back</a>
                <a href="<?= BASE_URL ?>students/delete/<?= 
                $data["student"]["id"];?>/yes" class="btn btn-danger ms-2">Delete</a>
            </div>
        </div>
    </div>
</div>
