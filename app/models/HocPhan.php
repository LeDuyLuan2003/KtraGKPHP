<?php
require_once 'app/config/database.php';
class HocPhan {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Lấy tất cả học phần
    public function getAll() {
        $query = "SELECT * FROM HocPhan";
        $stmt = $this->db->getConnection()->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

