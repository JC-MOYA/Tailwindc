<?php
require_once "../controller/payroll.controller.php";
require_once "../model/payroll.model.php";

class savePayroll{
  public $trans_type; 
  public $empid;
  public $empname;
  public $emptype;
  public $rateperday;
  public $numdayswork;
  public $cola;
  public $overtimehrs;
  public $gross;
  public $tax;
  public $philhealth;
  public $sss;
  public $cshadvance;
  public $totalded;
  public $netsalary;

  public function savePayrollRecord(){
    $trans_type = $this->trans_type;
    $empid = $this->empid;
    $empname = $this->empname;
    $emptype = $this->emptype;
  	$rateperday = $this->rateperday;
    $numdayswork = $this->numdayswork;
    $cola = $this->cola;
    $overtimehrs = $this->overtimehrs;
    $gross = $this->gross;
    $tax = $this->tax;
    $philhealth = $this->philhealth;
    $sss = $this->sss;
    $cshadvance = $this->cshadvance;
    $totalded = $this->totalded;
    $netsalary = $this->netsalary;
            
    $data = array("empid"=>$empid,
                  "empname"=>$empname,
                  "emptype"=>$emptype,
                  "rateperday"=>$rateperday,
                  "numdayswork"=>$numdayswork,
                  "cola"=>$cola,
                  "overtimehrs"=>$overtimehrs,
                  "gross"=>$gross,
                  "tax"=>$tax,
                  "philhealth"=>$philhealth,
                  "sss"=>$sss,
                  "cshadvance"=>$cshadvance,
                  "totalded"=>$totalded,
                  "netsalary"=>$netsalary);

    if ($trans_type == 'New'){
      $answer = (new ControllerPayroll)->ctrAddPayroll($data);
    }else{
      $answer = (new ControllerPayroll)->ctrEditPayroll($data);
    }

  }
}

$save_payroll = new savePayroll();
$save_payroll -> trans_type = $_POST["trans_type"];
$save_payroll -> empid = $_POST["empid"];
$save_payroll -> empname = $_POST["empname"];
$save_payroll -> emptype = $_POST["emptype"];
$save_payroll -> rateperday = $_POST["rateperday"];
$save_payroll -> numdayswork = $_POST["numdayswork"];
$save_payroll -> cola = $_POST["cola"];
$save_payroll -> overtimehrs = $_POST["overtimehrs"];
$save_payroll -> gross = $_POST["gross"];
$save_payroll -> tax = $_POST["tax"];
$save_payroll -> philhealth = $_POST["philhealth"];
$save_payroll -> sss = $_POST["sss"];
$save_payroll -> cshadvance = $_POST["cshadvance"];
$save_payroll -> totalded = $_POST["totalded"];
$save_payroll -> netsalary = $_POST["netsalary"];

$save_payroll -> savePayrollRecord();