<?php
   
   class Gloo_DB {
   	
		private $numCalls ;
		static private $instance = NULL ;
		private $mysqli ;

        private function __construct() {
            $this->init_db();
        }

		private function __clone() {

		}

        static function getInstance() {

			if(self::$instance == NULL) {
                self::$instance = new Gloo_DB();
			}
          
			return self::$instance ;

		}

        public function get_connection() {
            $this->numCalls++ ;
            return $this->mysqli ;

        }

        public  function close_connection() {
          $this->mysqli->close();

		}

		private  function init_db() {

             $this->mysqli = new mysqli(
				Gloo_Config::getInstance()->mysql_host(),
				Gloo_Config::getInstance()->mysql_user(),
				Gloo_Config::getInstance()->mysql_password(),
				Gloo_Config::getInstance()->mysql_db()
			);

			if(mysqli_connect_errno()) {
				trigger_error(mysqli_connect_error() , E_USER_ERROR);
				exit(1);

			}
            
		}

 
	}
?>
