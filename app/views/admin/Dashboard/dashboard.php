<div class="container">

    <div class="row">
        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Mahasiswa</h5>
                    <p class="card-text fs-4"><?= $data["jumlah_mahasiswa"]; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Dosen</h5>
                    <p class="card-text fs-4"><?= $data["jumlah_dosen"]; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Mata Kuliah</h5>
                    <p class="card-text fs-4"><?= $data["jumlah_mata_kuliah"]; ?></p>
                </div>
            </div>
        </div>
    </div>

</div>