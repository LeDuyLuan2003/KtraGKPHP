<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h2>Danh Sách Học Phần</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã Học Phần</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hocPhanList as $hocPhan): ?>
            <tr>
                <td><?= $hocPhan['MaHP'] ?></td>
                <td><?= $hocPhan['TenHP'] ?></td>
                <td><?= $hocPhan['SoTinChi'] ?></td>
                <td>
                    <!-- Nút đăng ký học phần -->
                    <a href="index.php?url=Hocphan/register/<?= $hocPhan['MaHP'] ?>" class="btn btn-success btn-sm">Đăng Ký</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'app/views/shares/footer.php'; ?>