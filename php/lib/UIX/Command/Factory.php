<?php


/**
 *
 * @author rajeevj
 */
class UIX_Command_Factory {
    static function get($name) {
        $command = new UIX_Command_Null();
        switch($name) {
            case 'VIDEO' :
                $command = new UIX_Command_News();
                break ;
            case 'NEWS' :
                $command = new UIX_Command_Video();
                break ;
            default :
                $command = new UIX_Command_Null();
                break ;


        }
        return $command;


    }
    
}
?>
