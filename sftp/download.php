<?php

	$message = '';
	$fileName="path/to/file/on/local/machine/FILENAME";//path of file and file name
	$strServer = "X"; 					//Server Address
	$strServerPort = "X";  				//Port Address
	$strServerUsername = "X"; 			// UserName
	$strServerPassword = "X"; 			//password
	$strFilePath = '/root/Public/';  	//place from where fill will be uploaded

	//checking whether ssh2 extension is installed or not on server
	if (!function_exists("ssh2_connect")) die("function ssh2_connect doesn't exist"); 
		//connect to server
		$connection = ssh2_connect($strServer, $strServerPort);
		//Validating the access from server
		if(ssh2_auth_password($connection, $strServerUsername, $strServerPassword)){

			//reciving the file to server
			$sendFlag=ssh2_scp_recv($resConnection, $fileName,$strFilePath );

			//checking whether File has been recived or not
			if($sendFlag) {
				$message ="File Sent Sucessfully";
			} else {
				$message="failure";
			}	
	} else{
		//error message in case of failure in authentication
		$message = "Unable to authenticate on server";
	}
	//closing the sftp connection
	ssh2_exec($resConnection, 'exit');
	
	echo $message;
?>