<?php
    
	class Gloo_Util {
		
		static function b64_encrypt($token) {
			$token = base64_encode($token);
			$token = str_rot13($token);
            return $token ;

				
		}
		
		static function b64_decrypt($token) {
			$token = str_rot13($token);
			$token = base64_decode($token);
			return $token ;
				
		}
				
		
		
	}
?>
