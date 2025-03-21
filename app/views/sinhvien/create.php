<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h2>Tạo Sinh Viên Mới</h2>
    <form action="index.php?url=Sinhvien/create" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="MaSV" class="form-label">Mã Sinh Viên</label>
            <input type="text" class="form-control" id="MaSV" name="MaSV" required>
        </div>
        <div class="mb-3">
            <label for="HoTen" class="form-label">Họ Tên</label>
            <input type="text" class="form-control" id="HoTen" name="HoTen" required>
        </div>
        <div class="mb-3">
            <label for="GioiTinh" class="form-label">Giới Tính</label>
            <select class="form-select" id="GioiTinh" name="GioiTinh" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="NgaySinh" class="form-label">Ngày Sinh</label>
            <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
        </div>
        <div class="mb-3">
            <label for="Hinh" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" id="Hinh" name="Hinh" required>
        </div>
        <div class="mb-3">
            <label for="MaNganh" class="form-label">Mã Ngành</label>
            <input type="text" class="form-control" id="MaNganh" name="MaNganh" required>
        </div>
        <button type="submit" class="btn btn-primary">Tạo Sinh Viên</button>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>