<?php
    
		require_once ('setenv.inc' );
		require_once ($_SERVER['GLOO_INC_DIR'].'class_loader.inc' );
		
		run_main();
		
		function run_main() {

            test_compiler();

		}
		
		function test_b64_encryption() {
			$token = "osje8L" ;
			$enc = Gloo_Util::b64_encrypt($token);
			echo " encrypted string :: $enc \n" ;
			$dec = Gloo_Util::b64_decrypt($enc);
			echo " decrypted string :: $dec \n" ;
				
		}

		function test_compiler() {
            $source = "<div> some text  __#_[VIDEO,4,MAX]_#__   </div> <div> another text __#_[NEWS,2]_#__ </div>";
            $compiler = new UIX_Compiler();
            $output = $compiler->compile($source);
            echo $output ;
            


        }
		
?>
