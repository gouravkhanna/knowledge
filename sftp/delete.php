<?php

	$message = '';
	$fileName="FILENAME"; //file name
	$strServer = "X"; 					//Server Address
	$strServerPort = "X";  				//Port Address
	$strServerUsername = "X"; 			// UserName
	$strServerPassword = "X"; 			//password
	$strFilePath = '/root/Public/';  	//place from where fill will be deleted

	//checking whether ssh2 extension is installed or not on server
	if (!function_exists("ssh2_connect")) die("function ssh2_connect doesn't exist"); 
		//connect to server
		$connection = ssh2_connect($strServer, $strServerPort);
		//Validating the access from server
		if(ssh2_auth_password($connection, $strServerUsername, $strServerPassword)){
			//Initialize SFTP subsystem
			$res = ssh2_sftp($connection);
			//deleting the file to server
			$delFlag=ssh2_sftp_unlink($res, $strFilePath.$fileName);
			//checking whether File has been deleted or not
			if($delFlag) {
				$message ="Removed the file from server";
			} else {
				$message="Failure";
			}
	} else{
		//error message in case of failure in authentication
		$message = "Unable to authenticate on server";
	}
	//closing the sftp connection
	ssh2_exec($resConnection, 'exit');
	
	echo $message;
?>