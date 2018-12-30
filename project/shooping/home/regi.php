<?php
$user='root';
$pas='';
$db='jewellery';

$db=new mysqli('localhost',$user,$pas,$db) or die("unable to connect");

if($db)
{

	if(isset($_POST['submit']))
	{
		$fname=$_POST['fname'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		

		$sql="INSERT INTO `reg` (`Fname`,  `Email`, `Password`) VALUES ('".$fname."', '".$email."', '".$pass."')";

		$query="INSERT INTO `admin` (`email`, `password`) VALUES ('".$email."', '".$pass."')";

		$log=mysqli_query($db,$query);

		$result=mysqli_query($db,$sql);


		if(!$result && !$log)
		{
			echo " you have not successfully register";
		}
		else
		{
       		 echo "<script type='text/javascript'>
       		 window.location.href='http://localhost/example/shooping//admin/login.html'</script>";
       	   	 exit();
		}

	}
}
else
{
	echo "error";
}
?>