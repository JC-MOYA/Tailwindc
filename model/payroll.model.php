<?php
require_once "connection.php";
class ModelPayroll{
	static public function mdlAddPayroll($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            $empname = $data["empname"];
            $lastchar = $empname[strlen($empname)-1];
            $emp_num = (new Connection)->connect()->prepare("SELECT CONCAT(LPAD((count(id)+1),2,'0')) as gen_id  FROM payroll FOR UPDATE");
	        $emp_num->execute();
			$empnumber = $emp_num -> fetchAll(PDO::FETCH_ASSOC);

			$empid = strtoupper($lastchar) . date("y") . $empnumber[0]['gen_id'];
			$stmt = $pdo->prepare("INSERT INTO payroll(empid, empname, emptype, rateperday, numdayswork, cola, overtimehrs, gross, tax, philhealth, sss, cshadvance, totalded, netsalary) VALUES (:empid, :empname, :emptype, :rateperday, :numdayswork, :cola, :overtimehrs, :gross, :tax, :philhealth, :sss, :cshadvance, :totalded, :netsalary)");

			$stmt->bindParam(":empid", $empid, PDO::PARAM_STR);
			$stmt->bindParam(":empname", $data["empname"], PDO::PARAM_STR);
			$stmt->bindParam(":emptype", $data["emptype"], PDO::PARAM_STR);
			$stmt->bindParam(":rateperday", $data["rateperday"], PDO::PARAM_STR);
			$stmt->bindParam(":numdayswork", $data["numdayswork"], PDO::PARAM_STR);
			$stmt->bindParam(":cola", $data["cola"], PDO::PARAM_STR);
			$stmt->bindParam(":overtimehrs", $data["overtimehrs"], PDO::PARAM_STR);
			$stmt->bindParam(":gross", $data["gross"], PDO::PARAM_STR);
			$stmt->bindParam(":tax", $data["tax"], PDO::PARAM_STR);
			$stmt->bindParam(":philhealth", $data["philhealth"], PDO::PARAM_STR);
			$stmt->bindParam(":sss", $data["sss"], PDO::PARAM_STR);
			$stmt->bindParam(":cshadvance", $data["cshadvance"], PDO::PARAM_STR);
			$stmt->bindParam(":totalded", $data["totalded"], PDO::PARAM_STR);
			$stmt->bindParam(":netsalary", $data["netsalary"], PDO::PARAM_STR);
			$stmt->execute();			

		    $pdo->commit();
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;
	}

	static public function mdlEditPayroll($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

			$stmt = $pdo->prepare("UPDATE payroll SET empname = :empname, emptype = :emptype, rateperday = :rateperday, numdayswork = :numdayswork, cola = :cola, overtimehrs = :overtimehrs, gross = :gross, tax = :tax, philhealth = :philhealth, sss = :sss, cshadvance = :cshadvance, totalded = :totalded, netsalary = :netsalary WHERE empid = :empid");

			$stmt->bindParam(":empid", $data["empid"], PDO::PARAM_STR);
			$stmt->bindParam(":empname", $data["empname"], PDO::PARAM_STR);
			$stmt->bindParam(":emptype", $data["emptype"], PDO::PARAM_STR);
			$stmt->bindParam(":rateperday", $data["rateperday"], PDO::PARAM_STR);
			$stmt->bindParam(":numdayswork", $data["numdayswork"], PDO::PARAM_STR);
			$stmt->bindParam(":cola", $data["cola"], PDO::PARAM_STR);
			$stmt->bindParam(":overtimehrs", $data["overtimehrs"], PDO::PARAM_STR);
			$stmt->bindParam(":gross", $data["gross"], PDO::PARAM_STR);
			$stmt->bindParam(":tax", $data["tax"], PDO::PARAM_STR);
			$stmt->bindParam(":philhealth", $data["philhealth"], PDO::PARAM_STR);
			$stmt->bindParam(":sss", $data["sss"], PDO::PARAM_STR);
			$stmt->bindParam(":cshadvance", $data["cshadvance"], PDO::PARAM_STR);
			$stmt->bindParam(":totalded", $data["totalded"], PDO::PARAM_STR);
			$stmt->bindParam(":netsalary", $data["netsalary"], PDO::PARAM_STR);
			$stmt->execute();

		    $pdo->commit();
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;
	}	

	static public function mdlShowPayrollList($emptype){
		if ($emptype != ''){
			$stmt = (new Connection)->connect()->prepare("SELECT * FROM payroll WHERE emptype = '$emptype' ORDER BY empname");
		}else{
			$stmt = (new Connection)->connect()->prepare("SELECT * FROM payroll ORDER BY empname");
	    }
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlShowPayroll($item, $value){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM payroll WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}		
}