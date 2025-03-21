<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['message'] ?>
            <?php unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>

    <h2>Danh Sách Học Phần Đã Đăng Ký</h2>
    <form action="index.php?url=Dangky/save" method="POST">
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
                        <a href="index.php?url=Dangky/delete/<?= $dangKy['MaDK'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa học phần này?')">Xóa Đăng Ký</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h4>Tổng Số Tín Chỉ: <?= $totalCredits ?></h4>
        <form action="index.php?url=Dangky/deleteAll" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa hết học phần đã đăng ký?')">
            <button type="submit" class="btn btn-danger mt-3">Xóa hết học phần đã đăng ký</button>
        </form>
        <a href="index.php?url=Hocphan/index" class="btn btn-secondary">Trở Về Danh Sách Học Phần</a>
    </form>

    <h2 class="mt-5">Thông Tin Sinh Viên</h2>
    <table class="table table-bordered">
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
            <th>Ngành Học</th>
            <td><?= $sinhVien['TenNganh'] ?></td>
        </tr>
    </table>

    <form action="index.php?url=Dangky/save" method="POST">
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>