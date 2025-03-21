<?php
require_once 'app/config/database.php';

class NganhHoc {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    // Lấy tất cả các ngành học
    public function getAll() {
        $query = "SELECT * FROM NganhHoc";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy thông tin ngành học theo mã ngành
    public function getByMaNganh($maNganh) {
        $query = "SELECT * FROM NganhHoc WHERE MaNganh = :MaNganh";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':MaNganh', $maNganh);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm ngành học mới
    public function add($maNganh, $tenNganh) {
        $query = "INSERT INTO NganhHoc (MaNganh, TenNganh) VALUES (:MaNganh, :TenNganh)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':MaNganh', $maNganh);
        $stmt->bindParam(':TenNganh', $tenNganh);
        return $stmt->execute();
    }
}
?>
