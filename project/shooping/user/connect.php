<?php
error_reporting(0);
$a=mysql_connect('localhost','root','');
if($a){
	echo "connect";
}
else{
	echo "not";
}


?>