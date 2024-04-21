<?php

class Appointment {
    public $DB_SERVER='localhost';
	public $DB_USERNAME='root';
	public $DB_PASSWORD='';
	public $DB_DATABASE='db_wbtest';
	public $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}

	public function create_appointment($lastname, $firstname, $email, $contact, $address, $apt_date, $apt_time){

    $data = [
        $lastname, $firstname, $email, $contact, $apt_date, $apt_time, $address
    ];

    $stmt = $this->conn->prepare("INSERT INTO tbl_appointment (apt_lastname, apt_firstname, apt_email, apt_contact, apt_date, apt_time, apt_address) VALUES (?, ?, ?, ?, ?, ?, ?)");

    try {
        $this->conn->beginTransaction();
        $stmt->execute($data);
        $this->conn->commit();
    } catch (Exception $e) {
        $this->conn->rollBack();
        throw $e;
    }

    return true;
}

    public function update_appointment($lastname, $firstname, $email, $contact, $address, $id){
        $NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

        $sql = "UPDATE tbl_appointment SET apt_lastname=:apt_lastname, apt_firstname=:apt_firstname, apt_email=:email, apt_contact=:apt_contact, apt_date=:apt_date, apt_time=:apt_time, apt_address=:apt_address WHERE apt_id=:apt_id";

        $q = $this ->conn->prepare($sql);
        $q->execute(array(
			':apt_lastname'=>$lastname, 
			':apt_firstname'=>$firstname, 
			':email'=>$email, 
			':apt_contact'=>$contact, 
			':apt_date'=>$NOW, 
			':apt_time'=>$NOW, 
			':apt_address'=>$address, 
			':apt_id'=>$id));
        return true;
    }

    public function delete_appointment($id){
        $sql = "DELETE FROM tbl_appointment WHERE apt_id = :id";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        try {

            $stmt->execute();
            return true; 
        } catch (PDOException $e) {

            return false; 
        }
	}

    public function list_appointment(){
		$sql = "SELECT * FROM tbl_appointment WHERE apt_date";
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

    function get_appointment_id($email){
		$sql="SELECT apt_id FROM tbl_appointment WHERE apt_email = :email";	
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email]);
		$apt_id = $q->fetchColumn();
		return $apt_id;
	}
	function get_apt_email($id){
		$sql="SELECT apt_email FROM tbl_appointment WHERE apt_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$apt_email = $q->fetchColumn();
		return $apt_email;
	}
	function get_apt_firstname($id){
		$sql="SELECT apt_firstname FROM tbl_appointment WHERE apt_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$apt_firstname = $q->fetchColumn();
		return $apt_firstname;
	}

	function get_apt_lastname($id){
		$sql="SELECT apt_lastname FROM tbl_appointment WHERE apt_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$apt_lastname = $q->fetchColumn();
		return $apt_lastname;
	}

	function get_apt_contact($id){
		$sql="SELECT apt_contact FROM tbl_appointment WHERE apt_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$apt_contact = $q->fetchColumn();
		return $apt_contact;
	}

	function get_address($id){
		$sql="SELECT apt_address FROM tbl_appointment WHERE apt_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$apt_address = $q->fetchColumn();
		return $apt_address;
	}
}