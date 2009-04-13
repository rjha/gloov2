<?php
    include 'gloo.inc';
	require_once ($_SERVER['GLOO_INC_DIR'].'class_loader.inc' );
	require_once ($_SERVER['GLOO_INC_DIR'].'session.inc' );
	require_once ($_SERVER['GLOO_INC_DIR'].'error.inc' );
    unset($_SESSION);
    $page = new Gloo_Page();
    $connx = Gloo_DB::getInstance()->get_connection();
    $form1 = 'form1';
    $form2 = 'form2' ;
    $map1 = array('name' => 'Rajeev Jha', 'age' => 33);
    $map2 = array('name' => 'Sanjeev Jha', 'age' => 25);
    $page->set_sticky_map($form1,$map1);
    $page->set_sticky_map($form2,$map2);

    Gloo_DB::getInstance()->close_connection();
    //var_dump($page);
    $arr = $_SESSION['sticky_maps'];
    print_r($arr);
    echo ' <br/> -- sticky_maps printed -- <br/>';

    $sticky = $page->get_sticky_map($form1);
    
    echo $sticky->get('name');
    echo '<br/>';
    echo $sticky->get('age');
    echo '<br/>';
    echo $sticky->get('address', 'J-202');
   
   
    echo ' -- form1 sticky printed -- <br/>';
    
    $arr = $_SESSION['sticky_maps'];
    $sticky = $page->get_sticky_map($form2);
    echo $sticky->get('name');
    echo '<br/>';
    echo $sticky->get('age');
    echo '<br/>';
    echo $sticky->get('address');
    echo '<br/> -- form2 printed -- <br/>';

    $messages = array(' message1', 'message2' ,'message3');
    $page->set_messages('section1' ,$messages);
    $errors = $page->get_messages('section1');
    echo '<br/>';
    print_r($errors);


?>
