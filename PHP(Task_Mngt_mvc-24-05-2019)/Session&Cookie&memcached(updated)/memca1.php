<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$memcache     = new Memcache;
$memcache->connect('127.0.0.1', 11211) or die ("Unable to connect to Memcached");

$exampleValue = $memcache->get('exampleKey');

if($exampleValue === true){
    return $exampleValue;
}
else{
    $exampleValue = $db->get_var(sprintf("SELECT exampleValue FROM %s WHERE id = '%d'",'exampleTable',1));
    if($exampleValue){
        $memcache->set('exampleKey', $exampleValue, false, 1800);
        return $exampleValue;
    }
    else{
        return false;
    }
}


?>