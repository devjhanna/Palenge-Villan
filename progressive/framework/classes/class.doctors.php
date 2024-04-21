<?php
class Doctors{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbtest';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
	}
	
	public function new_doctor($email, $fullname, $contact, $specialty, $status){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$fullname, $email, $contact, $specialty, $status, $NOW, $NOW],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_doctors (doctor_fullname, doctor_email, doctor_contact, doctor_specialty, doctor_status, doctor_date_updated, doctor_time_updated) VALUES (?,?,?,?,?,?,?)");
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

	public function update_doctor($fullname, $contact, $specialty, $status, $id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_doctors SET doctor_fullname=:doctor_fullname, doctor_contact=:doctor_contact, doctor_specialty=:doctor_specialty, doctor_status=:doctor_status, doctor_date_updated=:doctor_date_updated,doctor_time_updated=:doctor_time_updated WHERE doctor_id=:doctor_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(
            ':doctor_fullname' => $fullname,
            ':doctor_contact' => $contact,
            ':doctor_specialty' => $specialty,
            ':doctor_status' => $status,
            ':doctor_date_updated' => $NOW,
            ':doctor_time_updated' => $NOW,
            ':doctor_id' => $id
        ));
        return true;
	}

	public function delete_doctor($id){
		$sql = "DELETE FROM tbl_doctors WHERE doctor_id = :id";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        try {
            $stmt->execute();
            return true; 
        } catch (PDOException $e) {
            return false; 
        }
	}

	public function doctor_verify($id){
		$sql = "SELECT * FROM tbl_doctors WHERE doctor_id = :id";
		$stmt = $this->conn->prepare($sql);

		$stmt->bindParam( ":id", $id, PDO::PARAM_INT);
		$stmt->execute();
		try {
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			return false;
		}
	}

	public function list_doctors(){
		$sql = "SELECT * FROM tbl_doctors";
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

	function get_doctor_id($email){
		$sql="SELECT doctor_id FROM tbl_doctors WHERE doctor_email = :email";	
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email]);
		$doctor_id = $q->fetchColumn();
		return $doctor_id;
	}
	function get_doctor_email($id){
		$sql="SELECT doctor_email FROM tbl_doctors WHERE doctor_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$doctor_email = $q->fetchColumn();
		return $doctor_email;
	}
	function get_doctor_fullname($id){
		$sql="SELECT doctor_fullname FROM tbl_doctors WHERE doctor_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$doctor_fullname = $q->fetchColumn();
		return $doctor_fullname;
	}
	function get_doctor_specialty($id){
		$sql="SELECT doctor_specialty FROM tbl_doctors WHERE doctor_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$doctor_specialty = $q->fetchColumn();
		return $doctor_specialty;
	}

	function get_doctor_contact($id){
		$sql="SELECT doctor_contact FROM tbl_doctors WHERE doctor_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$doctor_contact = $q->fetchColumn();
		return $doctor_contact;
	}

	function get_doctor_status($id){
		$sql="SELECT doctor_status FROM tbl_doctors WHERE doctor_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$doctor_status = $q->fetchColumn();
		return $doctor_status;
	}

	
	function get_doctor_session(){
		if(isset($_SESSION['doctor_login']) && $_SESSION['doctor_login'] == true){
			return true;
		}else{
			return false;
		}
	}

	public function check_doctor_login($email,$password){
		
		$sql = "SELECT count(*) FROM tbl_doctors WHERE doctor_email = :email AND doctor_password = :password" ; 
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email,'password' => $password]);
		$number_of_rows = $q->fetchColumn();
		
		if($number_of_rows == 1){
			
			$_SESSION['doctor_login']=true;
			$_SESSION['doctor_email']=$email;
			
			echo "Login Successful";
			return true;
		}else{
			return false;
		}
	}
    }