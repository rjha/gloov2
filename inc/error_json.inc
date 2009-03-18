<?php

	
	//error handler for json data requests 
	function handle_errors($errorno,$errorstr,$file,$line){
		
		if(error_reporting() == 0 ){
			// donot do anything for silenced errors
			// print " silenced" ;
			return ;
		
		}
		
		if($errorno == E_NOTICE || $errorno == E_USER_NOTICE ) {
			// just print notices to error file - and carry ON 
			// send to our log file 
			error_log (" $errorno  :  $file : $line : $errorstr\n",0);
			return ;
			
		}
		@ ob_end_clean();
		error_log (" $errorno  :  $file : $line : $errorstr\n",0);
		$response = array (
					'status'=>'6001',	
					'message'=> $errorstr);
		echo json_encode($response);	
		exit ;
		
	}


	set_error_handler('handle_errors');
	ob_start();


?>