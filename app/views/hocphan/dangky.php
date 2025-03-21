<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h2>Danh Sách Học Phần Đã Đăng Ký</h2>
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
            <?php foreach ($dangKyList as $dangKy): ?>
            <tr>
                <td><?= $dangKy['MaHP'] ?></td>
                <td><?= $dangKy['TenHP'] ?></td>
                <td><?= $dangKy['SoTinChi'] ?></td>
                <td>
                    <!-- Nút Xóa Đăng Ký -->
                    <a href="dangky/delete/<?= $dangKy['MaDK'] ?>" class="btn btn-danger btn-sm">Xóa Đăng Ký</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Tổng Số Tín Chỉ: <?= $totalCredits ?></h4>

    <a href="hocphan/index" class="btn btn-secondary">Trở Về Danh Sách Học Phần</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>
