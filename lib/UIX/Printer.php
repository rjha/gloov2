<?php


/**
 *
 * @author rajeevj
 */
class UIX_Printer {

    function __construct() {
        
    }

    function send($commandData){
        //massage $commandData
        $len = strlen($commandData);
        // Remove [ && ]
        $commandData = substr($commandData,1,$len-2);
        $commandData = trim($commandData);
        //trimmed length 
        $len = strlen($commandData);
        //haystack,needle
        $pos1 = strpos($commandData,",");
        
        $name = NULL ;
        $payload = NULL ;

        if ($pos1 !== false) {
            //payload found
            $name = substr($commandData,0,$pos1);
            $payload = substr($commandData,$pos1+1,$len-$pos1-1 );
        } else {
            // No payload case
            $name = $commandData;
    
        }
        Gloo_Logger::getInstance()->debug("command => $name");
        Gloo_Logger::getInstance()->debug("payload => $payload ") ;
        //@todo - process this command and return printer output!
        $command = UIX_Command_Factory::get($name);
        return $command->execute($payload);
        

    }
}
?>
