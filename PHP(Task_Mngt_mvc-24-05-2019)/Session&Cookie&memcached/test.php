<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/* ======== Memcached Server Connection ========= */
$memcache = new Memcached();
$memcache->addServer('localhost', 11211) or die ("Could not connect");

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shrey";

 
$link = mysqli_connect($servername, $username, $password, $dbname);
/*$db = mysql_select_db(DB_NAME, $link) or die("Couldn't select database");
 */
/*========= Database Connection Code End Here ============== */
$query = "SELECT name FROM shreyas where name!=''";
 
//TTL = 1000; //Second
 
$setKey = md5("discussdesk_".$query); //set the memcached key. should be unique
$getCacheDetail  = $memcache->get($setKey); // Get the cached content based on the key
 
/* This block check if cached value is avaliable then serve the data from cache else database*/
if ($getCacheDetail) {
 $assoc=$getCacheDetail;
 echo "data comes from cache";
 echo'<br>';
}
else
{
 $rec = mysqli_query($link,$query);
while($result= mysqli_fetch_assoc($rec))
$assoc[]=$result; // Results storing in array
 $memcache->set($setKey, $assoc);
 echo "data comes from database";
}
 
foreach($assoc as $resultvalue)
{
echo $resultvalue['name'];
echo '<br>';
}
?>