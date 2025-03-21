<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'app/models/SinhVien.php';  // Thêm model SinhVien

class DangNhapController {

    private $sinhVienModel;

    public function __construct() {
        $this->sinhVienModel = new SinhVien();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maDangNhap = $_POST['maDangNhap'];

            // Kiểm tra mã sinh viên có tồn tại
            $sinhVien = $this->sinhVienModel->getByMaSV($maDangNhap);
            if ($sinhVien) {
                // Đăng nhập thành công
                $_SESSION['loggedin'] = true;
                $_SESSION['maSV'] = $maDangNhap; // Lưu mã sinh viên vào session
                header('Location: index.php?url=Sinhvien/index');
            } else {
                // Đăng nhập thất bại
                echo "Mã sinh viên không tồn tại.";
            }
        } else {
            require_once 'app/views/login.php';  // Gọi view để hiển thị form đăng nhập
        }
    }

    public function logout() {
        // Hủy session đăng nhập
        session_destroy();
        header('Location: index.php?url=Dangnhap/login');
    }
}
?>