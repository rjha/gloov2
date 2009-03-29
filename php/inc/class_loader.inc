<?php


function __autoload($className) {
    loadClass($className);
}


function loadClass($className) {
    include_once($_SERVER['GLOO_LIB_DIR']. str_replace('_', '/', $className) . '.php');
}


?>