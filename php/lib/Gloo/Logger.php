<?php



/**
 *
 * Gloo logger class is no longer  a wrapper around PEAR Log.
 * PEAR Log is not compatible with PHP5 E_STRICT MODE.
 * Gloo_Logger is our own implementation of logger classes.
 * 
 * @see also http://www.indelible.org/php/Log/guide.html
 *
 * @author rajeevj
 */


class Gloo_Logger {

    
    static private $instance = NULL ;
    private $sysLevel ;
    private $fhandle ;
    private $priority ;
    private $isDebug = false ;



    const ERROR_PRIORITY = 4;
    const WARN_PRIORITY = 3 ;
    const INFO_PRIORITY = 2 ;
    const DEBUG_PRIORITY = 1 ;
    
    function __construct() {
            //level is an integer
        	$logfile = $_SERVER['GLOO_WEB_DIR']."gloov2.log" ;
            //open for writing only 
			$this->fhandle = fopen($logfile, "a+");
            $this->sysLevel = Gloo_Config::getInstance()->log_level() ;
            $this->priority = $this->level_to_priority($this->sysLevel);
            $this->isDebug = Gloo_Config::getInstance()->is_debug();
            
    }

    function __destruct() {
        fclose($this->fhandle);
    }

    function level_to_priority($level) {
      
        $priority = Gloo_Logger::ERROR_PRIORITY ;
        if(is_null($level) || empty($level)) {
            return $priority ;
        }
        $level = strtoupper($level);
       
        switch($level) {
            case 'DEBUG' :
                $priority = Gloo_Logger::DEBUG_PRIORITY ;
                break ;
            case 'INFO' :
                 $priority = Gloo_Logger::INFO_PRIORITY ;
                break ;

             case 'WARN' :
                 $priority = Gloo_Logger::WARN_PRIORITY ;
                break ;

             case 'ERROR' :
                $priority = Gloo_Logger::ERROR_PRIORITY ;
                break ;
             default :
                $priority = Gloo_Logger::ERROR_PRIORITY ;
                break ;

        }

        return $priority ;
        

    }
    static function getInstance() {
        if(self::$instance == NULL) {
            self::$instance = new Gloo_Logger();

		}
		return self::$instance ;

	}

    function debug($message) {
        if(!$this->isDebug) { return ; }
        // keep the original backtrace of caller
        
        if($this->isDebug) {
            if(intval(Gloo_Logger::DEBUG_PRIORITY) >= $this->priority){
                $bt = debug_backtrace();
                $this->logIt($bt, $message, 'debug');
            }

        }
    }

    function info($message) {
       
        if(intval(Gloo_Logger::INFO_PRIORITY) >= $this->priority){
                $bt = debug_backtrace();
                $this->logIt($bt, $message, 'info');
         }
    }

    function warning($message) {
       
        if(intval(Gloo_Logger::WARN_PRIORITY) >= $this->priority){
               $bt = debug_backtrace();
               $this->logIt($bt, $message, 'warning');
         }
    }

     function error($message) {
       
        if(intval(Gloo_Logger::ERROR_PRIORITY) >= $this->priority){
           $bt = debug_backtrace();
           $this->logIt($bt, $message, 'error');
         }
    }
    
    function logIt($bt,$message,$level) {
        // log messages in UTC timezone
        $logMessage = "\n". date("d.m.Y H:i:s"). ' ['.$level.'] ';
        $logMessage .= $bt[0]['file'].' :'.$bt[0]['line'].'  ';
        $logMessage .= $message ;
        fwrite($this->fhandle,$logMessage);
        
    }




}
?>
