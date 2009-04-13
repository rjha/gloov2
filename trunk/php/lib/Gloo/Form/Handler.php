<?php

class Gloo_Form_Handler {

	/*
	 * @parameter POST or GET array
	 * If the named variable is not present in supplied array
	 * then return null.
	 * if the named variable is present in supplied array then html-sanitize
	 * and return the variable.
	 *
	 */
	
	private $post ;
	
	private $ferrors ;
	private $fvalues;
	private $felements ;
	private $validated ;
	
	function __construct($post) {
		$this->post = $post ;
		$this->felements = array();
		$this->fvalues = array();
		$this->ferrors = array();
		$this->validated = false ;
	
	}
	
	function addError($error) {
		array_push($this->ferrors,$error);	
	}
	
	function addSticky($name,$value) {
			$this->fvalues[$name] = $value;
	}
	
	
	function getErrors() { 
		if(!$this->validated) {
			trigger_error(' Form validation has not been done yet!' ,E_USER_ERROR);	
		}
		return $this->ferrors ; 
	} 
	function getValues() { 
		if(!$this->validated) {
			trigger_error(' Form validation has not been done yet!' ,E_USER_ERROR);	
		}
	
		return $this->fvalues ;  
		
	}
	
	function hasErrors() {
		if(sizeof($this->ferrors) > 0 )	 {
			return true ;
			
		} else {
			return false ;
		}
	}
	
	
	function addEQ($vname,$compareTo) {
		if(!isset($compareTo) || empty($compareTo)) {
			trigger_error('right operand can not be empty for addEQ comparison');	
		}
		$element = NULL;
		$element = $this->felements[$vname];
		if(is_null($element)) {
			trigger_error('unknown left operand  for addEQ comparison');
		}
		$element->setEQValue($compareTo);
		
	}
	
	
	function add($vname,$vdisplay,$vsize,$sanitize = false,$vrequired=false){
		if(is_null($this->post) || sizeof($this->post) == 0 ) {
			trigger_error(' Form handler POST array not set' ,E_USER_ERROR);
				
		}
		$element = new Gloo_Form_Element();
		$value =  '';
   
		if(isset($this->post[$vname]) ){
            if($sanitize) {
                $value = self::html_secure($this->post[$vname]);
            } else {
                $value = trim($this->post[$vname]);
            }
		}

		$element->setName($vname);
		$element->setValue($value);
		$element->setRequired($vrequired);
		$element->setSize($vsize);
		$element->setDisplay($vdisplay);
		$this->felements[$vname]= $element ;
		
		
	}
	
		
	function validate() {
			//print_r($this->felements);
			// go over all form elements 
			foreach($this->felements as $felement) {
				$felement->validate();
				$errors = $felement->getErrors();
				foreach($errors as $error) {
					array_push($this->ferrors,$error);	
				}
				$this->fvalues[$felement->getName()] = $felement->getValue();
								
			}
			$this->validated = true ;
			
			
	}
		
	
	static function sanitize ($vars,$name) {
		// by default keep null string as return value
		$value =  '';
		if(isset($vars[$name]) ){
			$value = self::html_secure($vars[$name]);
		}
		return $value ;
	}

   	
	static function html_secure($x){
		return trim(htmlspecialchars($x,ENT_QUOTES));
	}


}

?>
