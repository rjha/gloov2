<?php 
	include 'gloo.inc';
	require_once ($_SERVER['GLOO_INC_DIR'].'class_loader.inc' );
	require_once ($_SERVER['GLOO_INC_DIR'].'session.inc' );
	require_once ($_SERVER['GLOO_INC_DIR'].'error.inc' );
	
	//web/ca/note/frm/add.php

	// Save Button pressed
	if(isset($_POST['save']) && ($_POST['save'] == 'Save')) {
		
		$fhandler = new Gloo_Form_Handler('ca_note_form',$_POST);
		$fhandler->add('title','Title',50,true,true);
		$fhandler->validate();
		$fvalues = $fhandler->getValues();
		$ferrors = $fhandler->getErrors();
		$page = new Gloo_Page();
		
		$menuKey = $page->get_data('menu_key');
		$location = "/app2/ca/note/add/text.php" ;
		//Error case
		if($fhandler->hasErrors()){ 
            $page->set_message('ca_note_form',$fhandler->getErrors());
            $page->set_sticky_map('ca_note_form',$fvalues);
            //@todo get this value from page workflow data
            $location = "/app2/ca/note/add/text.php";
            
           
        }
        
        //Everything went fine
        header("location: ".$location);

    }
    

?>
