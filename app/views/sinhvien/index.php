<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h2>Danh sách Sinh Viên</h2>
    <!-- Thêm nút "Add New Student" ở đây -->
    <a href="index.php?url=Sinhvien/create" class="btn btn-success mb-3">Thêm Sinh Viên Mới</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>MaSV</th>
                <th>HoTen</th>
                <th>GioiTinh</th>
                <th>NgaySinh</th>
                <th>Hinh</th>
                <th>MaNganh</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinhVienList as $sinhVien): ?>
            <tr>
                <td><?= $sinhVien['MaSV'] ?></td>
                <td><?= $sinhVien['HoTen'] ?></td>
                <td><?= $sinhVien['GioiTinh'] ?></td>
                <td><?= $sinhVien['NgaySinh'] ?></td>
                <td><img src="<?= 'public/' . $sinhVien['Hinh'] ?>" alt="Image" class="img-thumbnail" width="100"></td>
                <td><?= $sinhVien['MaNganh'] ?></td>
                <td>
                    <a href="index.php?url=Sinhvien/edit/<?= $sinhVien['MaSV'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?url=Sinhvien/delete/<?= $sinhVien['MaSV'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    <a href="index.php?url=Sinhvien/detail/<?= $sinhVien['MaSV'] ?>" class="btn btn-info btn-sm">Details</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'app/views/shares/footer.php'; ?>