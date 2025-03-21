<?php
require_once 'app/models/SinhVien.php';

class SinhVienController {

    private $sinhVienModel;

    public function __construct() {
        // Khởi tạo model SinhVien
        $this->sinhVienModel = new SinhVien();
    }

    // Hiển thị danh sách sinh viên
    public function index() {
        // Lấy tất cả sinh viên từ model
        $sinhVienList = $this->sinhVienModel->getAll();
        require_once 'app/views/sinhvien/index.php';  // Gọi view để hiển thị danh sách sinh viên
    }

    // Tạo sinh viên mới
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $maSV = $_POST['MaSV'];
            $hoTen = $_POST['HoTen'];
            $gioiTinh = $_POST['GioiTinh'];
            $ngaySinh = $_POST['NgaySinh'];
            $maNganh = $_POST['MaNganh'];

            // Xử lý upload hình ảnh
            $hinh = '';
            if (isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] == 0) {
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jfif'];
                $fileType = mime_content_type($_FILES['Hinh']['tmp_name']);
                if (in_array($fileType, $allowedTypes)) {
                    $targetDir = 'public/content/images/';
                    $targetFile = $targetDir . basename($_FILES['Hinh']['name']);
                    if (move_uploaded_file($_FILES['Hinh']['tmp_name'], $targetFile)) {
                        $hinh = 'content/images/' . basename($_FILES['Hinh']['name']);
                    }
                } else {
                    echo "Định dạng tệp không được hỗ trợ.";
                    return;
                }
            }

            // Thêm sinh viên mới vào database
            $this->sinhVienModel->add($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh);
            header('Location: index.php?url=Sinhvien/index');  // Quay lại trang danh sách sinh viên
        } else {
            require_once 'app/views/sinhvien/create.php';  // Gọi view để hiển thị form tạo mới sinh viên
        }
    }

    // Sửa thông tin sinh viên
    public function edit($maSV) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $hoTen = $_POST['HoTen'];
            $gioiTinh = $_POST['GioiTinh'];
            $ngaySinh = $_POST['NgaySinh'];
            $maNganh = $_POST['MaNganh'];

            // Xử lý upload hình ảnh
            $hinh = $_POST['HinhCu'];
            if (isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] == 0) {
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jfif'];
                $fileType = mime_content_type($_FILES['Hinh']['tmp_name']);
                if (in_array($fileType, $allowedTypes)) {
                    $targetDir = 'public/content/images/';
                    $targetFile = $targetDir . basename($_FILES['Hinh']['name']);
                    if (move_uploaded_file($_FILES['Hinh']['tmp_name'], $targetFile)) {
                        $hinh = 'content/images/' . basename($_FILES['Hinh']['name']);
                    }
                } else {
                    echo "Định dạng tệp không được hỗ trợ.";
                    return;
                }
            }

            // Cập nhật thông tin sinh viên
            $this->sinhVienModel->update($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh);
            header('Location: index.php?url=Sinhvien/index');  // Quay lại trang danh sách sinh viên
        } else {
            // Lấy thông tin sinh viên để hiển thị trong form
            $sinhVien = $this->sinhVienModel->getByMaSV($maSV);
            require_once 'app/views/sinhvien/edit.php';  // Gọi view để hiển thị form sửa sinh viên
        }
    }

    // Xóa sinh viên
    public function delete($maSV) {
        // Xóa sinh viên
        $this->sinhVienModel->delete($maSV);
        header('Location: index.php');  // Quay lại trang danh sách sinh viên
    }

    // Xem chi tiết sinh viên
    public function detail($maSV) {
        // Lấy thông tin chi tiết sinh viên
        $sinhVien = $this->sinhVienModel->getByMaSV($maSV);
        require_once 'app/views/sinhvien/detail.php';  // Gọi view để hiển thị chi tiết sinh viên
    }
}
?>