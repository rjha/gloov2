<?php


/**
 *
 * @author rajeevj
 */

class UIX_Command_Null implements UIX_Command {

   function __construct(){

   }

   function execute($payload) {
        return "Null"  ;


   }
}

?>
