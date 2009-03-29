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
    $data1 = array('name' => 'Rajeev Jha', 'age' => 33);
    $data2 = array('name' => 'Sanjeev Jha', 'age' => 25);
    $page->setSticky($form1,$data1);
    $page->setSticky($form2,$data2);

    Gloo_DB::getInstance()->close_connection();
    var_dump($page);
    $arr = $_SESSION['sticky_data'];
    print_r($arr);
    echo '<br>';
    $sticky = $page->getSticky($form1);
    
    echo $sticky->get('name');
    echo '<br/>';
    echo $sticky->get('age');
     echo '<br/>';
    echo $sticky->get('address', 'J-202');
    $arr = $_SESSION['sticky_data'];
   
    echo '<br>';

    $sticky = $page->getSticky($form1);

    echo $sticky->get('name');
    echo '<br/>';
    echo $sticky->get('age');
     echo '<br/>';
    echo $sticky->get('address', 'J-202');
    $arr = $_SESSION['sticky_data'];
   
    echo '<br>';



?>
