<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h2>Chi Tiết Sinh Viên</h2>
    <table class="table">
        <tr>
            <th>Mã Sinh Viên</th>
            <td><?= $sinhVien['MaSV'] ?></td>
        </tr>
        <tr>
            <th>Họ Tên</th>
            <td><?= $sinhVien['HoTen'] ?></td>
        </tr>
        <tr>
            <th>Giới Tính</th>
            <td><?= $sinhVien['GioiTinh'] ?></td>
        </tr>
        <tr>
            <th>Ngày Sinh</th>
            <td><?= $sinhVien['NgaySinh'] ?></td>
        </tr>
        <tr>
            <th>Hình Ảnh</th>
            <td><img src="<?= 'public/' . $sinhVien['Hinh'] ?>" alt="Image" class="img-thumbnail" width="100"></td>
        </tr>
        <tr>
            <th>Mã Ngành</th>
            <td><?= $sinhVien['MaNganh'] ?></td>
        </tr>
    </table>
    <a href="index.php?url=Sinhvien/index" class="btn btn-secondary">Quay lại danh sách</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>