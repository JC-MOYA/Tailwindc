<?php
require_once "../controller/payroll.controller.php";
require_once "../model/payroll.model.php";

class payrollListTable{ 
	public function showPayrollListTable(){
		$payroll = (new ControllerPayroll)->ctrShowPayrollList();
		if(count($payroll) == 0){
			$jsonData = '{"data":[]}';
			echo $jsonData;
			return;
		}
		$jsonData = '{
			"data":[';
				for($i=0; $i < count($payroll); $i++){
					$jsonData .='[
						"'.$payroll[$i]["empid"].'",
						"'.$payroll[$i]["empname"].'",
						"'.$payroll[$i]["emptype"].'"
					],';
				}
				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 
			}';
		echo $jsonData;
	}
}

$activatePayrollList = new payrollListTable();
$activatePayrollList -> showPayrollListTable();