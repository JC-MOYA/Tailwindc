<?php
require_once "../controller/payroll.controller.php";
require_once "../model/payroll.model.php";

class AjaxPayrollTransactionList{ 
   public $emptype;

   public function ajaxDisplayPayrollTransactionList(){
   	 $emptype = $this->emptype;
     $answer = (new ControllerPayroll)->ctrShowPayrollList($emptype);
     echo json_encode($answer);
   }
}

$payroll = new AjaxPayrollTransactionList();
$payroll -> emptype = $_POST["emptype"];
$payroll -> ajaxDisplayPayrollTransactionList();