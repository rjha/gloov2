<?php


/**
 *
 * @author rajeevj
 */
class UIX_Compiler {
   
   private $gp ;

    function __construct() {
        $this->gp = new UIX_Printer();
    }

    /*
     * compile the source and produce compiled HTML output
     *
     */
    function compile($source) {
        // change the greediness of + matches
        // http://www.perl.com/doc/manual/html/pod/perlre.html
        $pattern = '/__#_\[.+?\]_#__/' ;
        //You need an array with class name and method name to pass
        // class methods as callback inside preg_replace
        $output = preg_replace_callback($pattern, array('UIX_Compiler','process_command'), $source);
        return $output ;
        

    }
    
    function process_command($matches) {
        Gloo_Logger::getInstance()->debug($matches[0]);
        // Match is __#_[COMMAND]_#__
        $command = $matches[0];
        $len = strlen($command);
        //substring from position 4(0-indexed) and read length-8
        // [COMMAND]
        $command = substr($command,4,$len-8);
        //get web output for this command
        $output = $this->gp->send($command);
        return $output  ;
        
    }

    
    
}
?>
