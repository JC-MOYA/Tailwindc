<?php

require_once "connection.php";

class ModelClients{
	static public function mdlAddClient($table, $data){
        $cust_id = (new Connection)->connect()->prepare("SELECT CONCAT('C', LPAD((count(id)+1),4,'0')) as gen_id  FROM clients FOR UPDATE");

            $cust_id->execute();
		    $custid = $cust_id -> fetchAll(PDO::FETCH_ASSOC);

		$stmt = (new Connection)->connect()->prepare("INSERT INTO $table(clientid, isactive, cname, email, phone, address, website, cperson, mobile) VALUES (:clientid, :isactive, :cname, :email, :phone, :address, :website, :cperson, :mobile)");

		$stmt->bindParam(":clientid", $custid[0]['gen_id'], PDO::PARAM_STR);
		$stmt->bindParam(":isactive", $data["isactive"], PDO::PARAM_INT);
		$stmt->bindParam(":cname", $data["cname"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
		$stmt->bindParam(":address", $data["address"], PDO::PARAM_STR);
		$stmt->bindParam(":website", $data["website"], PDO::PARAM_STR);
		$stmt->bindParam(":cperson", $data["cperson"], PDO::PARAM_STR);
		$stmt->bindParam(":mobile", $data["mobile"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;

	}

	static public function mdlShowClients(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM clients ORDER BY cname");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}	

	static public function mdlEditClient($table, $data){
		$stmt = (new Connection)->connect()->prepare("UPDATE $table SET clientid = :clientid, isactive = :isactive, cname = :cname, email = :email, phone = :phone, address = :address, website = :website, cperson = :cperson, mobile = :mobile WHERE id = :id");

		$stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
		$stmt->bindParam(":clientid", $data["clientid"], PDO::PARAM_STR);
		$stmt->bindParam(":isactive", $data["isactive"], PDO::PARAM_INT);
		$stmt->bindParam(":cname", $data["cname"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
		$stmt->bindParam(":address", $data["address"], PDO::PARAM_STR);
		$stmt->bindParam(":website", $data["website"], PDO::PARAM_STR);
		$stmt->bindParam(":cperson", $data["cperson"], PDO::PARAM_STR);
		$stmt->bindParam(":mobile", $data["mobile"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}		
}