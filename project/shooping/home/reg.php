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
		$lname=$_POST['lname'];
		$gender=$_POST['gender'];
		$Contact=$_POST['cno'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$date=$_POST['date'];

		$sql="INSERT INTO `regi` (`Fname`, `Lname`, `Gender`, `Contact`, `Email`, `Password`, `bdate`) VALUES ('".$fname."', '".$lname."', '".$gender."', '".$Contact."', '".$email."', '".$pass."', '".$date."')";

		$query="INSERT INTO `login`(`Email`, `password`) VALUES ('".$email."', '".$pass."')";
		
		$log=mysqli_query($db,$query);

		$result=mysqli_query($db,$sql);


		if(!$result && !$log)
		{
			echo " you have not successfully register";
		}
		else
		{
       		 echo "<script type='text/javascript'>
       		 window.location.href='http://localhost/example/shooping/home/login.html'</script>";
       	   	 exit();
		}

	}
}
else
{
	echo "error";
}
?>