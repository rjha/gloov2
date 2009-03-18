<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$source = "<div> some text  __#_[VIDEO,4,MAX]_#__   </div> <div> another text __#_[NEWS,2]_#__ </div>";
$pattern = '/__#_\[(\d|,|\w)+\]_#__/' ;
$replacement = 'macro_command' ;
//echo preg_replace($pattern, $replacement, $source);
echo preg_replace_callback($pattern, 'command_processor', $source);


function command_processor($matches) {
    //print_r($matches);
    // Match is __#_[COMMAND]_#__
    $command = $matches[0];
    $len = strlen($command);
    //substring from position 4(0-indexed) and read length-8
    // [COMMAND]
    $command = substr($command,4,$len-8);
    return $command ;
    
}
?>
