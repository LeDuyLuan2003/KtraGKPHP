<?php
require_once 'app/config/database.php';

class SinhVien {

    private $db;

    public function __construct() {
        // Kết nối cơ sở dữ liệu
        $this->db = new Database();
    }

    // Lấy tất cả sinh viên
    public function getAll() {
        $query = "SELECT * FROM SinhVien";
        $stmt = $this->db->getConnection()->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sinh viên theo mã sinh viên
    public function getByMaSV($maSV) {
        $query = "SELECT SinhVien.*, NganhHoc.TenNganh FROM SinhVien INNER JOIN NganhHoc ON SinhVien.MaNganh = NganhHoc.MaNganh WHERE SinhVien.MaSV = :MaSV";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':MaSV', $maSV);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm sinh viên mới
    public function add($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        $query = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                  VALUES (:MaSV, :HoTen, :GioiTinh, :NgaySinh, :Hinh, :MaNganh)";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':MaSV', $maSV);
        $stmt->bindParam(':HoTen', $hoTen);
        $stmt->bindParam(':GioiTinh', $gioiTinh);
        $stmt->bindParam(':NgaySinh', $ngaySinh);
        $stmt->bindParam(':Hinh', $hinh);
        $stmt->bindParam(':MaNganh', $maNganh);
        return $stmt->execute();
    }

    // Cập nhật thông tin sinh viên
    public function update($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        $query = "UPDATE SinhVien SET HoTen = :HoTen, GioiTinh = :GioiTinh, NgaySinh = :NgaySinh, Hinh = :Hinh, MaNganh = :MaNganh WHERE MaSV = :MaSV";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':MaSV', $maSV);
        $stmt->bindParam(':HoTen', $hoTen);
        $stmt->bindParam(':GioiTinh', $gioiTinh);
        $stmt->bindParam(':NgaySinh', $ngaySinh);
        $stmt->bindParam(':Hinh', $hinh);
        $stmt->bindParam(':MaNganh', $maNganh);
        return $stmt->execute();
    }

    // Xóa sinh viên
    public function delete($maSV) {
        $query = "DELETE FROM SinhVien WHERE MaSV = :MaSV";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':MaSV', $maSV);
        return $stmt->execute();
    }
}
?>