<?php


/**
 *
 * @author rajeevj
 */
class Gloo_Compiler {

   

    function __construct() {
        
    }

    /*
     * compile the source and produce compiled HTML output
     *
     */
    function compile($source) {
        // command tokens consist of alphanumeric and commas
        $pattern = '/__#_\[(\d|,|\w)+\]_#__/' ;
        //You need an array with class name and method name to pass
        // class methods as callback inside preg_replace
        $output = preg_replace_callback($pattern, array('Gloo_Compiler','process_command'), $source);
        return $output ;
        

    }
    
    function process_command($matches) {
        //print_r($matches);
        // Match is __#_[COMMAND]_#__
        $command = $matches[0];
        $len = strlen($command);
        //substring from position 4(0-indexed) and read length-8
        // [COMMAND]
        $command = substr($command,4,$len-8);
        return $command ;

    }

    
    
}
?>
