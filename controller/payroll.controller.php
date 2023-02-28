<?php


class ControllerPayroll{
	static public function ctrAddPayroll($data){
	   	$answer = (new ModelPayroll)->mdlAddPayroll($data);
	}

	static public function ctrEditPayroll($data){
	   	$answer = (new ModelPayroll)->mdlEditPayroll($data);
	}

	static public function ctrShowPayrollList($emptype){
		$answer = (new ModelPayroll)->mdlShowPayrollList($emptype);
		return $answer;
	}

	static public function ctrShowPayroll($item, $value){
		$answer = (new ModelPayroll)->mdlShowPayroll($item, $value);
		return $answer;
	}	
}