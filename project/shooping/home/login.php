<?php
session_start(); // Right at the top of your script
$user='root';
$pas='';
$db='jewellery';

$db=new mysqli('localhost',$user,$pas,$db) or die("unable to connect");

if($db)
{
	echo "successfully connect";

	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$pass=$_POST['pass'];

		$sql="SELECT *  FROM `login` WHERE Email='".$email."' AND  Password='".$pass."'";

		$result=mysqli_query($db,$sql);

		$row=mysqli_num_rows($result);

		if($row < 1)
		{
		
			echo "<script type='text/javascript'>alert('failed!')</script>";
			exit();
		}
		else
		{
			$data=mysqli_fetch_assoc($result);

			 $_SESSION['email']=$email;
       		 echo "<script type='text/javascript'>
       		 window.location.href='http://localhost/example/shooping/user/uhome.html?id=<?php echo $email; ?> '</script>";
       		 
       		 if(isset($_SESSION[$email]))
       		 {
       		 	echo "Welcome .$_SESSION[$email].";
       		 }
       		 else
       		 {

       		 }
       		 exit();



       	}
	}
}
else
{
	echo "error";
}
?>