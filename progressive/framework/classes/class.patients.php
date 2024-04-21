<?php
class Patients{
	private $DB_SERVER='localhost';
	private $DB_patientNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbtest';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_patientNAME,$this->DB_PASSWORD);
	}
	
	public function new_patient($email, $fullname, $contact, $address, $diagnosis){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$fullname, $diagnosis, $email, $contact, $address, $NOW, $NOW],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_patients (patient_fullname, patient_diagnosis, patient_email, patient_contact, patient_address, patient_date_updated, patient_time_updated) VALUES (?,?,?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}

	public function update_patient($fullname, $contact, $address, $diagnosis, $id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_patients SET patient_fullname=:patient_fullname, patient_contact=:patient_contact, patient_address=:patient_address, patient_diagnosis=:patient_diagnosis, patient_date_updated=:patient_date_updated,patient_time_updated=:patient_time_updated WHERE patient_id=:patient_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(
            ':patient_fullname' => $fullname,
            ':patient_contact' => $contact,
            ':patient_address' => $address,
            ':patient_diagnosis' => $diagnosis,
            ':patient_date_updated' => $NOW,
            ':patient_time_updated' => $NOW,
            ':patient_id' => $id
        ));
        return true;
	}

	public function delete_patient($id){
		$sql = "DELETE FROM tbl_patients WHERE patient_id = :id";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        try {
            $stmt->execute();
            return true; 
        } catch (PDOException $e) {
            return false; 
        }
	}

	public function list_patients(){
		$sql = "SELECT * FROM tbl_patients";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
}

	function get_patient_id($email){
		$sql="SELECT patient_id FROM tbl_patients WHERE patient_email = :email";	
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email]);
		$patient_id = $q->fetchColumn();
		return $patient_id;
	}
	function get_patient_email($id){
		$sql="SELECT patient_email FROM tbl_patients WHERE patient_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$patient_email = $q->fetchColumn();
		return $patient_email;
	}
	function get_patient_fullname($id){
		$sql="SELECT patient_fullname FROM tbl_patients WHERE patient_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$patient_firstname = $q->fetchColumn();
		return $patient_firstname;
	}
	function get_patient_diagnosis($id){
		$sql="SELECT patient_diagnosis FROM tbl_patients WHERE patient_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$patient_diagnosis = $q->fetchColumn();
		return $patient_diagnosis;
	}

	function get_patient_contact($id){
		$sql="SELECT patient_contact FROM tbl_patients WHERE patient_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$patient_contact = $q->fetchColumn();
		return $patient_contact;
	}

	function get_patient_address($id){
		$sql="SELECT patient_address FROM tbl_patients WHERE patient_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$patient_address = $q->fetchColumn();
		return $patient_address;
	}
	function get_patient_status($id){
		$sql="SELECT patient_status FROM tbl_patients WHERE patient_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$patient_status = $q->fetchColumn();
		return $patient_status;
	}
    }