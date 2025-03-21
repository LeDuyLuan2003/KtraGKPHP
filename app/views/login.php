<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h2>Đăng Nhập</h2>
    <form action="index.php?url=Dangnhap/login" method="POST">
        <div class="mb-3">
            <label for="maDangNhap" class="form-label">Mã Đăng Nhập</label>
            <input type="text" class="form-control" id="maDangNhap" name="maDangNhap" required>
        </div>
        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>