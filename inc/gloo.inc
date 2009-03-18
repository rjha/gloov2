<?php
	
	/*
	 * common INC file that sets up the application LIB path
	 * This file should be on include_path (check php.ini settings)
	 * 
	 */
	
	//hostname from request 
	$glooHostName = $_SERVER['HTTP_HOST'];
	
	
	//default theme 
	$glooTheme = "aqua" ;
	
		
	/*
	 * push in global variables 
	 * Here you can set different code paths based on the 
	 * HTTP_HOST. like, for demo.indigloo.net and www.indigloo.net 
	 * you can set two different LIB and INC folders.
	 * 
	 */
	//change code path accroding to server
	$glooCodePath = "d:/gloov2/" ;
	$glooWebPath = "d:/gloov2/web/" ;
	//include required application path 
	$glooBaseURI = "http://".$glooHostName.'/v2' ;
	
	
	$_SERVER['GLOO_LIB_DIR'] = $glooCodePath.'lib/' ;
	$_SERVER['GLOO_INC_DIR'] = $glooCodePath.'inc/' ;
	$_SERVER['GLOO_WEB_DIR'] = $glooWebPath ;
	$glooCssURI = $glooBaseURI."/art/".$glooTheme ;
	
	
	
	
?>
