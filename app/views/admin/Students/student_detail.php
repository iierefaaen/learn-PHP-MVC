<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Student Detail</h4>
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
                <label class="col-sm-3 col-form-label">Program Studi</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["jurusan"]; ?></p>
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
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?= $data["student"]["email"]; ?></p>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="<?= BASE_URL; ?>students" class="btn btn-secondary">Back</a>
                <a href="<?= BASE_URL ?>students/edit/<?= 
                $data["student"]["id"];?>" class="btn btn-primary ms-2">Edit</a>
            </div>
        </div>
    </div>
</div>
