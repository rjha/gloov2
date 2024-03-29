<?php
    
		require_once ('setenv.inc' );
		require_once ($_SERVER['GLOO_INC_DIR'].'class_loader.inc' );
		
		run_main();
		
		function run_main() {

          // test_compiler();
           // test_printer();
           //test_log();
          // test_flexy();
          test_form_handler();
		}
        
        function test_form_handler() { 
            $arr = array('title' => '' , 'name' => 'Rajeev');
            $fhandler = new Gloo_Form_Handler($arr);
            $fhandler->add('title','Title',50,true,true);
            $fhandler->validate();
            $fvalues = $fhandler->getValues();
        }

        
        function test_log() {
            Gloo_Logger::getInstance()->debug('debug.message1');
            Gloo_Logger::getInstance()->info('info.message2');
            Gloo_Logger::getInstance()->warning('warning.message3');
            Gloo_Logger::getInstance()->error('Error.message4');

        }
		function test_b64_encryption() {
			$token = "osje8L" ;
			$enc = Gloo_Util::b64_encrypt($token);
			echo " encrypted string :: $enc \n" ;
			$dec = Gloo_Util::b64_decrypt($enc);
			echo " decrypted string :: $dec \n" ;
				
		}

		function test_compiler() {
            $source = "<div> some text    __#_[NEWS,size=2]_#__ </div> <div> another text   __#_[VIDEO,size=4,abc=MAX]_#__</div>";
            $compiler = new UIX_Compiler();
            $output = $compiler->compile($source);
            echo $output ;
            


        }

        function test_printer() {
            $command = "[video , name=rajeev, email=jha.rajeev@gmail.com  ]" ;
            $gp = new UIX_Printer();
            $gp->send($command);
            

        }

         function test_flexy() {
              
              // define object and properties
              // corresponding to template variables
              $page = new stdClass;
              $page->items = array(
                    'Eggs',
                    'Bread',
                    'Milk',
                    'Bacon',
                    'Cornflakes'
                );

                          
                $flexy = Gloo_Flexy::getInstance();
              
                $flexy->compile('test.tmpl');
                $flexy->outputObject($page);


                
         }
		
?>
