<?php
    
	class Gloo_Form_Sticky {
		private $data ;
		
		function __construct() {
			$this->data = NULL ;
				
		}
		
		function setData($data) {
			$this->data = $data;	
		}
		
		function get($key,$default='') {
    		if( !is_null($this->data)
                && (sizeof($this->data) > 0 )
                && array_key_exists($key,$this->data)) {
                   return $this->data[$key] ;
            }else {
                return $default ;
            }
        }

        
            
		
	}
?>
