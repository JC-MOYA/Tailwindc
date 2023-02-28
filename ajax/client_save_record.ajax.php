<?php
require_once "../controller/clientsingle.controller.php";
require_once "../model/clientsingle.model.php";

class saveClient{
  public $trans_type; 

  public $cname;
  public $isactive;
  public $clientid;
  public $address;
  public $phone;
  public $mobile;
  public $email;
  public $website;
  public $cperson;

  public function saveClientRecord(){
    $trans_type = $this->trans_type;

  	$cname = $this->cname;
  	$isactive = $this->isactive;
  	$clientid = $this->clientid;
    $address = $this->address;
  	$phone = $this->phone;
  	$mobile = $this->mobile;
  	$email = $this->email;
    $website = $this->website;
    $cperson = $this->cperson;

    $data = array("cname"=>$cname,
    	            "isactive"=>$isactive,
                  "clientid"=>$clientid,
                  "address"=>$address,
                  "phone"=>$phone,
                  "mobile"=>$mobile,
                  "email"=>$email,
                  "website"=>$website,
                  "cperson"=>$cperson);

    if ($trans_type == 'New'){
      $answer = (new ControllerClient)->ctrAddClient($data);
    }else{
      $answer = (new ControllerClient)->ctrEditClient($data);
    }

  }
}

$save_client = new saveClient();
$save_client -> trans_type = $_POST["trans_type"];

$save_client -> cname = $_POST["cname"];
$save_client -> isactive = $_POST["isactive"];
$save_client -> clientid = $_POST["clientid"];
$save_client -> address = $_POST["address"];
$save_client -> phone = $_POST["phone"];
$save_client -> mobile = $_POST["mobile"];
$save_client -> email = $_POST["email"];
$save_client -> website = $_POST["website"];
$save_client -> cperson = $_POST["cperson"];

$save_client -> saveClientRecord();