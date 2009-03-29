<?php


/**
 *
 * @author rajeevj
 */
class Gloo_Page {
        

		function __construct () {
	
		}

        
        /**
         *
         * @param <type> $form - required form name 
         * @return <type>
         * 
         */
        function getSticky($form) {
            $sticky = new Gloo_Form_Sticky();
            
            if(isset($_SESSION['sticky_data']) 
                && !empty($_SESSION['sticky_data'])
                && array_key_exists($form,$_SESSION['sticky_data'])) {
                
                /*
                 * fetch our sticky data from session. Sticky data is indexed on $form.
                 * Remove a sticky after you fetch it from session.
                 *
                 */
                $data = $_SESSION['sticky_data'];
                if(!is_null($data[$form])) {
                    $sticky->setData($data[$form]);
                    $data[$form] = NULL ;
                }
                
                $_SESSION['sticky_data'] = $data ;
            }
            return $sticky ;
            

        }

        /**
         *
         * @param <type> $form sticky form name
         * @param <type> $stickyData array of name-value pairs for this form
         * @return <type> Array containing name-value pairs of sticky data for required form.
         */
         function setSticky($form,$stickyData) {
            
            if(isset($_SESSION['sticky_data']) && !empty($_SESSION['sticky_data'])) {
                //sticky array already in
                // $data is sticky array stored in session 
                $data = $_SESSION['sticky_data'];
                //index $form is populated
                $data[$form] =  $stickyData ;
                //push back in
                $_SESSION['sticky_data'] = $data ;
                
               
            } else {
                //No sticky data in session
                $data = array();
                 $data[$form] =  $stickyData ;
                
                //store in session
                $_SESSION['sticky_data'] = $data ;
                
            }
     
        }




}
?>
