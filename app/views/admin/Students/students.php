<div class="container mt-4">
    <h2 class="mb-3">Data Mahasiswa</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Angkatan</th>
            <th>Status</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1;
            foreach($data["students"] as $student) {
            ?>
            <tr>
            <td><?= $counter++; ?></td>
            <td><?= $student["nim"] ?></td>
            <td><?= $student["nama"] ?></td>
            <td><?= $student["jurusan"] ?></td>
            <td><?= $student["angkatan"] ?></td>
            <td><?= $student["status"] ?></td>
            <td>
                <div class="d-flex justify-content-center gap-2">
                    <a href="<?= BASE_URL; ?>detail/student/<?= $student["id"] ?>" class="btn btn-sm btn-success">Detail</a>
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                </div>
            </td>
            <?php } ?>
        </tbody>
    </table>
</div>

