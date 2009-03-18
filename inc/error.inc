<?php

	// This function can take 2->5 parameters 
	
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
		debug_print_backtrace();
		exit;

	}


	set_error_handler('handle_errors');
	ob_start();


?>