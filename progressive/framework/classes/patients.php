<?php
$host = 'localhost';
$dbname = 'db_wbtest';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

class Patients {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function get_patient_fullname($patient_id) {
        $sql = "SELECT patient_fullname FROM tbl_patients WHERE patient_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$patient_id]);
        $patient = $stmt->fetch(PDO::FETCH_ASSOC);
        return $patient['patient_fullname']; 
    }

    public function list_patients() {
        $sql = "SELECT patient_id, patient_fullname FROM tbl_patients";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>