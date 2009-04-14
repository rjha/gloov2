<?php
    class Gloo_Form_Element {
    	
		private $value ;
		private $name;
		private $display ;
		private $size ;
		private $required ;
		private $checkSize ;
		private $errors ;
		private $doEQ ;
		function __construct(){
			$this->required = false ;
			$this->checkSize = true ;
			$this->errors = array();
			$this->doEQ = false ;
				
		}
		
		function getName() { return $this->name ; } 
		function getErrors() { return $this->errors ; } 
		function getValue() { return $this->value ; }
	
		
		function setValue($value) { $this->value = $value; }
		function setName($name) { $this->name = $name; }
		function setDisplay($display) { $this->display = $display; }
		function setSize($size) { $this->size = $size ; }
		function setRequired ($required) { $this->required = $required; }
		function setCheckSize($flag) { $this->checkSize = $flag ; }
		
		
		function setEQValue($target) {
			$this->doEQ = true ;
			$this->eqvalue = $target ;
						
		}
		
		function validate() {

            if($this->required && empty($this->value)) {
				array_push($this->errors, $this->display. " is a required field " );
					
			}	
			if($this->checkSize && (strlen($this->value)  > $this->size )) {
				array_push($this->errors, $this->display. " exceeds maximum allowed length of ".$this->size );
			}
			if($this->doEQ && !empty($this->value)) {
				if($this->value	!= $this->eqvalue) {
					array_push($this->errors,$this->display. " should be ".$this->eqvalue. " ,please try again!" );
				}
			}
			Gloo_Logger::getInstance()->debug('Form element :: '.$this->name);
            Gloo_Logger::getInstance()->debug('size='.$this->size. ' required?='.$this->required);
            //Gloo_Logger::getInstance()->debug('errors?='.Gloo_Util::arr2nlstr($this->errors));
            
		}
					
		
		
	}
	
	
?>
