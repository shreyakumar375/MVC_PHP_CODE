<?php

 /*** error reporting on ***/
 error_reporting(E_ALL);
 ini_set('display_errors',0);
 if (file_exists("config/config.php")) {
 	include 'config/config.php';
 }else{
 	echo "Unable to include files.";
 }

 /*** define the site path ***/
 $site_path = realpath(dirname(__FILE__));
 define ('__SITE_PATH', $site_path);

 /*** include the init.php file ***/
 include 'includes/init.php';
 $registry->db = db::getInstance();

 /*** load the router ***/
 $registry->router = new router($registry);

 /*** set the controller path ***/
 $registry->router->setPath (__SITE_PATH . '/controller');

 /*** load up the template ***/
 $registry->template = new template($registry);

 /*** load the controller ***/
 $registry->router->loader();

?>
