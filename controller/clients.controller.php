<?php

class ControllerClients{
	static public function ctrCreateClient(){
		if(isset($_POST["tns-cname"])){
            if (isset($_POST['num-isactive'])){
			  $isactive=$_POST['num-isactive'];
			}else{
			  $isactive="0";
			}

		   	$table = "clients";
		   	$data = array("clientid"=>$_POST["tns-clientid"],
		   		          "isactive"=>$isactive,
		   				  "cname"=>$_POST["tns-cname"],
				          "email"=>$_POST["tns-email"],
				          "phone"=>$_POST["num-phone"],
				          "address"=>$_POST["tns-address"],
				          "website"=>$_POST["tns-website"],
				          "mobile"=>$_POST["num-mobile"],
				          "cperson"=>$_POST["tns-cperson"]);

		   	$answer = (new ModelClients)->mdlAddClient($table, $data);

		   	if($answer == "ok"){
				echo'<script>
                    swal.fire({
			          title: "Client details successfully appended!",
			          type: "success",
			          confirmButtonText: "Proceed",
			          confirmButtonClass: "btn btn-outline-success",
			          allowOutsideClick: false,
			          buttonsStyling: false,
			        }).then(function(answer){
			          if(result.value) {
                        window.location = "clientadd";
			          }
			        })
			    </script>';    
			}
		}
	}

	static public function ctrShowClients(){
		$answer = (new ModelClients)->mdlShowClients();
		return $answer;
	}

	static public function ctrEditClient(){
		if(isset($_POST["tns-cname"])){
            if (isset($_POST['num-isactive'])){
			  $isactive=$_POST['num-isactive'];
			}else{
			  $isactive="0";
			}

		   	$table = "clients";
		   	$data = array("id"=>$_POST["idClient"],
		   		          "clientid"=>$_POST["tns-clientid"],
		   		          "isactive"=>$isactive,
		   				  "cname"=>$_POST["tns-cname"],
				          "email"=>$_POST["tns-email"],
				          "phone"=>$_POST["num-phone"],
				          "address"=>$_POST["tns-address"],
				          "website"=>$_POST["tns-website"],
				          "mobile"=>$_POST["num-mobile"],
				          "cperson"=>$_POST["tns-cperson"]);

		   	$answer = (new ModelClients)->mdlEditClient($table, $data);

		   	if($answer == "ok"){
				echo'<script>
                    swal.fire({
			          title: "Client details successfully updated!",
			          type: "success",
			          confirmButtonText: "Proceed",
			          confirmButtonClass: "btn btn-outline-success",
			          allowOutsideClick: false,
			          buttonsStyling: false,
			        }).then(function(answer){
			          if(result.value) {
                        window.location = "clientadd";
			          }
			        })
			    </script>';    
			}
		}
	}		
}

