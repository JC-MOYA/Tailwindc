<?php
require_once "../controllers/clientsingle.controller.php";
require_once "../models/clientsingle.model.php";
class AjaxClient{
    public $clientid;
    public function ajaxGetClient(){
      $item = "clientid";
      $value = $this->clientid;
      $answer = (new ControllerClient)->ctrShowClient($item, $value);
      echo json_encode($answer);
    }
}
 
if(isset($_POST["clientid"])){
  $getClient = new AjaxClient();
  $getClient -> clientid = $_POST["clientid"];
  $getClient -> ajaxGetClient();
}