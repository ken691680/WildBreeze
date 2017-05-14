<?php
	require_once("Java/Java.inc");

	$auth = new Java("com.hitrust.b2ctoolkit.b2cpay.B2CPayAuth");

	$auth->setStoreId("60593");
	$auth->setOrderNo($ordernumber);
	$auth->setOrderDesc($orderdesc);
	$auth->setAmount($amount);
	$auth->setTicketNo($ticketno);
	$auth->transaction();

	if  ($auth->getRetCode() == "00" ) { 
        header('location:'.$auth->getToken());
	}else{ 
				echo " Retuen Code= " . $auth->getRetCode(); 
	} 

?>
