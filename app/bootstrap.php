<?php 
// Load Config file
require_once 'config/config.php';
// Load helpers
require_once 'helpers/helpers.php';
require_once 'config/connection.php';
require_once 'helpers/session_helper.php';

spl_autoload_register(function($className) {
   require_once 'libraries/' . $className . '.php';
})
?>