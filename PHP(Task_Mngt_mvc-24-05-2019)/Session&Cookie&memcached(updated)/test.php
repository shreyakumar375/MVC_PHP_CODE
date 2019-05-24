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
$query = "SELECT * FROM shreyas where name!='' and isActive!=0";
 
//TTL = 1000; //Second
 
$setKey = md5("discussdesk_".$query); //set the memcached key. should be unique
$getCacheDetail  = $memcache->get($setKey); // Get the cached content based on the key
 
/* This block check if cached value is avaliable then serve the data from cache else database*/
if ($getCacheDetail) {
 $assoc=$getCacheDetail;
 echo "Getting Data Using Memcached";
 echo'<br>';
 echo'<br>';
}
else
{
 $rec = mysqli_query($link,$query);
while($result= mysqli_fetch_assoc($rec))
$assoc[]=$result; // Results storing in array
 $memcache->set($setKey, $assoc,60);
 echo "data comes from database";
}
 echo "<table border='1' cellspacing='5' cellpadding='5' border-style='solid'><tr><th >SerialNo</th><th>Name</th><th>Address</th><th>Email-Id</th><th>MOB-NO</th><th>City</th><th>State</th></tr>";
foreach($assoc as $resultvalue)
{
	echo   "<tr><td>". $resultvalue["id"]. "</td><td>" . $resultvalue["name"]. "</td><td>" . $resultvalue["addr"]."</td><td>" . $resultvalue["textEmail"]."</td><td>" . $resultvalue["mobno"]."</td><td>" . $resultvalue["city"]."</td><td>" . $resultvalue["ste"]."</td></tr>";

}
?>