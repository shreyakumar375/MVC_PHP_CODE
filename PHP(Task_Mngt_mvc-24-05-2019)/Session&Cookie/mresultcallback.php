<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

<?php

$servers = explode(",", ini_get("session.save_path"));
$c = count($servers);
for ($i = 0; $i < $c; ++$i) {
  $servers[$i] = explode(":", $servers[$i]);
}
$memcached = new \Memcached();
call_user_func_array([ $memcached, "addServers" ], $servers);
print_r($memcached->getAllKeys());

?>