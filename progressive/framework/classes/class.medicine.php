<?php
class Medicine{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbtest';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function add_medicine($productname, $quantity, $cost, $brand){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$productname, $quantity, $cost, $brand, $NOW, $NOW],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_storage (product_name, product_quantity, product_cost, product_brand, product_date_updated, product_time_updated) VALUES (?,?,?,?,?,?)");
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

	public function update_medicine($productname, $quantity, $cost, $brand, $id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_storage SET product_name=:product_name, product_quantity=:product_quantity , product_cost=:product_cost, product_brand=:product_brand, product_date_updated=:product_date_updated, product_time_updated=:product_time_updated WHERE product_id=:product_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(
			':product_name'=>$productname, 
			':product_quantity'=>$quantity, 
			':product_cost'=>$cost, 
			':product_brand'=>$brand, 
			':product_date_updated'=>$NOW,
			':product_time_updated'=>$NOW,
			':product_id'=>$id));
		return true;
	}

	public function delete_medicine($id){
		$sql = "DELETE FROM tbl_storage WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        try {
            $stmt->execute();
            return true; 
        } catch (PDOException $e) {
            return false; 
        }
	}

	public function list_products(){
		$sql="SELECT * FROM tbl_storage";
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

	function get_product_id($productname){
		$sql="SELECT product_id FROM tbl_storage WHERE product_name = :product_name";	
		$q = $this->conn->prepare($sql);
		$q->execute(['product_name' => $productname]);
		$product_id = $q->fetchColumn();
		return $product_id;
	}

	function get_product_name($id){
		$sql="SELECT product_name FROM tbl_storage WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_name = $q->fetchColumn();
		return $product_name;
	}

	function get_product_quantity($id){
		$sql="SELECT product_quantity FROM tbl_storage WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_quantity = $q->fetchColumn();
		return $product_quantity;
	}
	function get_product_cost($id){
		$sql="SELECT product_cost FROM tbl_storage WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_cost = $q->fetchColumn();
		return $product_cost;
	}

    function get_product_brand($id){
		$sql="SELECT product_brand FROM tbl_storage WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_brand = $q->fetchColumn();
		return $product_brand;
	}

	/* public function product_access_level($product_access_level) {
		$sql= "SELECT count(*) FROM tbl_storage WHERE product_access = :product_access";
		$q = $this->conn->prepare($sql);
		$q->bindParam(":product_access", $product_access_level,PDO::PARAM_INT);
		$q->execute();

			$_SESSION['product_access']== 0 ? true: false;
			return $_SESSION['product_access'];
	} */
}