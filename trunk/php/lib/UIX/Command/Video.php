<?php


/**
 *
 * @author rajeevj
 */

class UIX_Command_Video implements UIX_Command {

   function __construct(){

   }
   
   function execute($payload) {
        //fetch data array
        $videos = array();
        $video1 = new UIX_VO_Video();
        $video1->title = 'Youtube video1';
        $video2 = new UIX_VO_Video();
        $video2->title = 'Youtube video2';
        
        array_push($videos,$video1);
        array_push($videos,$video2);

        $output = NULL ;
        //foreach data array object 
        // compile a template using flexy 
        // get output from flexy
       
        $flexy = Gloo_Flexy::getInstance();
        $flexy->compile('video.tmpl');
        //View object is stdClass ,i.e. PHP base class
        $view = new stdClass;
        //$videos is an array of $video objects 
        $view->videos = $videos ;
        $page->orgKey = "xvcgffh192828272";
        $output = $flexy->bufferedOutputObject ($view);

        return $output ;
        

   }
}

?>
