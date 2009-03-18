<?php



/**
 *
 * Gloo logger class is a wrapper around PEAR Log package.
 * @see http://www.indelible.org/php/Log/guide.html
 *
 * @author rajeevj
 */

require_once 'Log.php';

class Gloo_Logger {

    private $logger ;
    static private $instance = NULL ;
    
    function __construct() {
        $conf = array('mode' => 0600, 'lineFormat' => ' %1$s [%3$s]  %5$s [line: %6$s] -   %4$s');
        $this->logger = &Log::factory('file', $_SERVER['GLOO_WEB_DIR'].'gloo.log','gloo',$conf);
        //priority mask - change the global level here
        //@todo read and decide using some config file
        // allowed values - debug,info,warning,error
        $priority = Log::stringToPriority('debug');
        $mask = Log::MAX($priority);
        $this->logger->setMask($mask);


    }

    static function getInstance() {
        if(self::$instance == NULL) {
            self::$instance = new Gloo_Logger();

		}
		return self::$instance ;

	}

    function debug($message) {
        $this->logger->log($message,PEAR_LOG_DEBUG);
    }

    function info($message) {
        $this->logger->log($message,PEAR_LOG_INFO);
    }

    function warning($message) {
        $this->logger->log($message,PEAR_LOG_WARNING);
    }

     function error($message) {
        //why _LOG_ERR and not _LOG_ERROR? God only knows!
        $this->logger->log($message,PEAR_LOG_ERR);
    }
    



}
?>
