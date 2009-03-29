<?php

ini_set('session_use_cookies',1);
ini_set('session.use_only_cookies',1);

	if(isset($_SESSION) && isset($_SESSION['MAGIC_SESSION'])) {
		// session started : do nothing 
	} else {
		// start session, push magic variable in session 
		session_start();
		$_SESSION['MAGIC_SESSION'] = 'YES' ;
	}

	function check_login($login_page,$roles){
		
		if(!isset($_SESSION['uid']) 
			|| empty($_SESSION['uid'])
			|| !isset($_SESSION['role'])
			|| empty($_SESSION['role'])) {
			header('Location: '.$login_page);
		}
		
		$role_in_session = $_SESSION['role'];
		$security_ok = false ;

		// compare role  in session with wanted roles 
		foreach($roles as $wanted_role) {
			if($role_in_session == $wanted_role ) {
				$security_ok = true ;
				//optional arg with break 
				break 1;
			}			
		}
		
		if(!$security_ok){
			header('Location: '.$login_page);
		}


	
	}






?>