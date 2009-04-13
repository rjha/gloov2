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
         * @param <type> $form  name of hashmap
         * @param <type> $hashMap A hashmap containing name value pairs of form
         *
         */
         function set_sticky_map($form,$hashMap) {
           $this->store_in_session('sticky_maps',$form,$hashMap);

        }
        
        /**
         *
         * @param <type> $form -  name of the hashMap
         * @return <type> A  Hashmap containing name-value pairs for above form
         * 
         */
        function get_sticky_map($form) {
            $sticky = new Gloo_Form_Sticky();
            $data = $this->find_in_session('sticky_maps',$form);
            if(!is_null($data)) {
                $sticky->setData($data);
            }
            
            return $sticky ;
        
        }

       
        //Vanilla page data setter/getter 
        function set_data($name,$value) {
           $this->store_in_session('page_data',$name,$value);

        }

        function get_data($name) {
            //keep this data in session 
            $data = $this->find_in_session('page_data',$name,false);
            return $data ;
        }
        
        //Getter/setter for script messages, namespace is page section
         function set_message($section,$messages) {
            //script_message is an array of lists. Each element of array is indexed by
            // section name and contains a list of messages.
            $this->store_in_session('script_messages',$section,$messages);
      
        }

        function get_message($section) {
            
            $list = $this->find_in_session('script_messages',$section);
            if(is_null($list)) {
                $list = array();
            }
            return $list ;
        }

        //page data is stored in session 
        function store_in_session($sessionKey,$dataKey,$data) {
            //@todo - error if $data is NULL 
            if(isset($_SESSION[$sessionKey]) && !empty($_SESSION[$sessionKey])) {
                // This key is defined in session, fetch the data structure for
                // this session key

                $sessionData = $_SESSION[$sessionKey];
                //index $form is populated
                $sessionData[$dataKey] =  $data ;
                //push back in
                $_SESSION[$sessionKey] = $sessionData ;


            } else {
                //No session data stored for sessionKey
                $sessionData = array();
                $sessionData[$dataKey] =  $data ;
                //store in session
                $_SESSION[$sessionKey] = $sessionData ;

            }

        }

         function find_in_session($sessionKey,$dataKey,$makeNull=true) {
            $data = NULL ;
            if(isset($_SESSION[$sessionKey])
                && !empty($_SESSION[$sessionKey])
                && array_key_exists($dataKey,$_SESSION[$sessionKey])) {


                $sessionData = $_SESSION[$sessionKey];

                if(!is_null($sessionData[$dataKey])) {
                    $data = $sessionData[$dataKey];
                    //empty out from session
                    if($makeNull) {
                        $sessionData[$dataKey] = NULL ;
                         $_SESSION[$sessionKey] = $sessionData ;
                    }

                }

               
            }
            return $data ;

         }
         

}
?>
