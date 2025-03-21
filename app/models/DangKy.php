<?php
require_once 'app/config/database.php';

class DangKy {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Lấy danh sách học phần sinh viên đã đăng ký
    public function getByMaSV($maSV) {
        $query = "SELECT * FROM DangKy INNER JOIN ChiTietDangKy ON DangKy.MaDK = ChiTietDangKy.MaDK INNER JOIN HocPhan ON ChiTietDangKy.MaHP = HocPhan.MaHP WHERE DangKy.MaSV = :MaSV";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':MaSV', $maSV);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy tổng số tín chỉ sinh viên đã đăng ký
    public function getTotalCredits($maSV) {
        $query = "SELECT SUM(HocPhan.SoTinChi) AS TotalCredits FROM DangKy INNER JOIN ChiTietDangKy ON DangKy.MaDK = ChiTietDangKy.MaDK INNER JOIN HocPhan ON ChiTietDangKy.MaHP = HocPhan.MaHP WHERE DangKy.MaSV = :MaSV";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':MaSV', $maSV);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['TotalCredits'];
    }

    // Thêm học phần vào bảng DangKy và ChiTietDangKy
    public function add($maSV, $maHP) {
        $conn = $this->db->getConnection();
        try {
            // Kiểm tra xem MaSV có tồn tại trong bảng SinhVien không
            $query = "SELECT COUNT(*) FROM SinhVien WHERE MaSV = :MaSV";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':MaSV', $maSV);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count == 0) {
                throw new Exception("Sinh viên với MaSV $maSV không tồn tại.");
            }

            $conn->beginTransaction();

            // Thêm vào bảng DangKy
            $query = "INSERT INTO DangKy (MaSV, NgayDK) VALUES (:MaSV, CURDATE())";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':MaSV', $maSV);
            $stmt->execute();

            // Lấy MaDK vừa thêm vào
            $maDK = $conn->lastInsertId();

            // Thêm vào bảng ChiTietDangKy
            $query = "INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES (:MaDK, :MaHP)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':MaDK', $maDK);
            $stmt->bindParam(':MaHP', $maHP);
            $stmt->execute();

            $conn->commit();
            return true;
        } catch (Exception $e) {
            if ($conn->inTransaction()) {
                $conn->rollBack();
            }
            throw $e;
        }
    }

    // Xóa học phần đăng ký
    public function delete($maDK) {
        $conn = $this->db->getConnection();
        try {
            $conn->beginTransaction();

            // Xóa các bản ghi liên quan trong bảng ChiTietDangKy
            $query = "DELETE FROM ChiTietDangKy WHERE MaDK = :MaDK";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':MaDK', $maDK);
            $stmt->execute();

            // Xóa bản ghi trong bảng DangKy
            $query = "DELETE FROM DangKy WHERE MaDK = :MaDK";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':MaDK', $maDK);
            $stmt->execute();

            $conn->commit();
            return true;
        } catch (Exception $e) {
            if ($conn->inTransaction()) {
                $conn->rollBack();
            }
            throw $e;
        }
    }

    // Xóa tất cả học phần đăng ký của sinh viên
    public function deleteAllByMaSV($maSV) {
        $conn = $this->db->getConnection();
        try {
            $conn->beginTransaction();

            // Lấy tất cả MaDK của sinh viên
            $query = "SELECT MaDK FROM DangKy WHERE MaSV = :MaSV";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':MaSV', $maSV);
            $stmt->execute();
            $maDKs = $stmt->fetchAll(PDO::FETCH_COLUMN);

            // Xóa các bản ghi liên quan trong bảng ChiTietDangKy
            foreach ($maDKs as $maDK) {
                $query = "DELETE FROM ChiTietDangKy WHERE MaDK = :MaDK";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':MaDK', $maDK);
                $stmt->execute();
            }

            // Xóa các bản ghi trong bảng DangKy
            $query = "DELETE FROM DangKy WHERE MaSV = :MaSV";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':MaSV', $maSV);
            $stmt->execute();

            $conn->commit();
            return true;
        } catch (Exception $e) {
            if ($conn->inTransaction()) {
                $conn->rollBack();
            }
            throw $e;
        }
    }
}
?>