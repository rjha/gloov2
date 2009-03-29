<?php


/**
 *
 * Gloo_Flexy is a wrapper over PEAR package HTML_Template_Flexy
 * a template compiler.
 * 
 * @author rajeevj
 */

/*
 * There is a reason why we include PEAR.php. Because if you do not include
 * it here then Flexy code's attempt to load PEAR class results in autoload
 * being called and then search for PEAR.php happens in GLOO_LIB_DIR
 * 
 */

include_once('PEAR.php');
include ('HTML/Template/Flexy.php');


class Gloo_Flexy {

  static private $instance = NULL ;

  private function __construct() {        

  }

  static function getInstance() {
    if(self::$instance == NULL) {
        // set template options
        //@see also http://pear.php.net/manual/en/package.html.html-template-flexy.configuration.php

        $options = array(
            'templateDir'   => $_SERVER['GLOO_WEB_DIR'].'templates',
            'compileDir'    => $_SERVER['GLOO_WEB_DIR'].'templates_c',
            'compiler' => 'Flexy',
            'locale' => 'en',
            'debug' => 0
        );

        // initialize template engine
        $flexy = new HTML_Template_Flexy($options);
        self::$instance = $flexy;
	}
	return self::$instance ;

   }

  
}
?>
