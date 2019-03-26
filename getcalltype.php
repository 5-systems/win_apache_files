<?php

	header('Content-Type: text/html; charset=utf-8');	


	@$CallerNumber=$_REQUEST['CallerNumber'];	
	
	ini_set('default_socket_timeout', 10);

	ini_set("soap.wsdl_cache_enabled", "0");

	$SoapClient1C = new SoapClient("http://127.0.0.1:8080/database_name/ws/wsoktellexchange.1cws?wsdl", array('login'=>'WebService', 'password'=>'passwd'));


	If(isset($CallerNumber)) {
		$params=Array();
		$params['CallerNumber']=$CallerNumber;
		
		try{

			$Result = $SoapClient1C->GetCallType($params);
		}
		catch(Exception $e) {
			echo $e->getMessage();
		}


		if( gettype($Result)==="object" ) {

			echo $Result->return;

		}

	}


?>
