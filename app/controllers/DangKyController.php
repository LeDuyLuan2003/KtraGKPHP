<?php
require_once 'app/models/DangKy.php';
require_once 'app/models/HocPhan.php';
require_once 'app/models/SinhVien.php';  // Thêm model SinhVien

class DangKyController {
    private $dangKyModel;
    private $hocPhanModel;
    private $sinhVienModel;

    public function __construct() {
        $this->dangKyModel = new DangKy();
        $this->hocPhanModel = new HocPhan();
        $this->sinhVienModel = new SinhVien();
    }

    // Hiển thị danh sách học phần sinh viên đã đăng ký
    public function index() {
        $maSV = $_SESSION['maSV']; // Lấy mã sinh viên từ session
        // Lấy danh sách học phần sinh viên đã đăng ký
        $dangKyList = $this->dangKyModel->getByMaSV($maSV);
        // Tính tổng số tín chỉ sinh viên đã đăng ký
        $totalCredits = $this->dangKyModel->getTotalCredits($maSV);
        // Lấy thông tin sinh viên
        $sinhVien = $this->sinhVienModel->getByMaSV($maSV);
        // Gọi view để hiển thị danh sách học phần đã đăng ký và thông tin sinh viên
        require_once 'app/views/dangky/index.php';
    }

    // Xóa học phần đã đăng ký
    public function delete($maDK) {
        // Xóa học phần đăng ký
        $this->dangKyModel->delete($maDK);
        header('Location: index.php?url=Dangky/index');  // Quay lại trang danh sách đăng ký
    }

    // Xóa tất cả học phần đã đăng ký
    public function deleteAll() {
        $maSV = $_SESSION['maSV']; // Lấy mã sinh viên từ session
        // Xóa tất cả học phần đăng ký của sinh viên
        $this->dangKyModel->deleteAllByMaSV($maSV);
        $_SESSION['message'] = "Xóa tất cả học phần thành công!";
        $_SESSION['show_message'] = true;
        header('Location: index.php?url=Dangky/index');  // Quay lại trang danh sách đăng ký
    }

    // Lưu các thay đổi
    public function save() {
        // Xử lý lưu các thay đổi vào cơ sở dữ liệu
        $_SESSION['message'] = "Lưu thành công!";
        header('Location: index.php?url=Dangky/index');  // Quay lại trang danh sách đăng ký
    }
}
?>