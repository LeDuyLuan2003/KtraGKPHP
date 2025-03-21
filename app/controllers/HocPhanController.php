<?php
require_once 'app/models/HocPhan.php';
require_once 'app/models/DangKy.php';

class HocPhanController {
    private $hocPhanModel;
    private $dangKyModel;

    public function __construct() {
        $this->hocPhanModel = new HocPhan();
        $this->dangKyModel = new DangKy();
    }

    // Hiển thị danh sách học phần
    public function index() {
        $hocPhanList = $this->hocPhanModel->getAll();
        require_once 'app/views/hocphan/index.php';  // Gọi view danh sách học phần
    }

    // Đăng ký học phần
    public function register($maHP) {
        $maSV = $_SESSION['maSV']; // Lấy mã sinh viên từ session
        $this->dangKyModel->add($maSV, $maHP);
        header('Location: index.php?url=Hocphan/index');  // Quay lại trang danh sách học phần
    }
}
?>