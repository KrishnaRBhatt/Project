<?php


$user='root';
$pas='';
$db='jewellery';

$db=new mysqli('localhost',$user,$pas,$db) or die("unable to connect");

if($db)
{
	if(isset($_POST['submit']))
	{
			
			$r = "SELECT *  FROM `regi`";

			$result=mysqli_query($db,$r);
			$row=mysqli_num_rows($result);

			$password = $row['pass'];
			$to = $row['email'];
			$subject = "Your Recovered Password";
		 
			$message = " Please use this password to login " . $password;
			$headers = " From : poojabam902@gmail.com ";

			mail($to, $subject, $message, $headers);
			
				echo "Your Password has been sent to your email id";
	}
	else
	{
		echo "database";
	}	
}
else
{
	echo "connection problem";
}

?>