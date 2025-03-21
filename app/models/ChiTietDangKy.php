<?php
require_once 'app/config/database.php';

class ChiTietDangKy {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    // Lấy tất cả chi tiết đăng ký
    public function getAll() {
        $query = "SELECT * FROM ChiTietDangKy";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm chi tiết đăng ký mới
    public function add($maDK, $maHP) {
        $query = "INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES (:MaDK, :MaHP)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':MaDK', $maDK);
        $stmt->bindParam(':MaHP', $maHP);
        return $stmt->execute();
    }
}
?>
