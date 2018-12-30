<?php
$user='root';
$pas='';
$db='jewellery';

$db=new mysqli('localhost',$user,$pas,$db) or die("unable to connect");

if($db)
{

	if(isset($_POST['submit']))
	{
		$owner=$_POST['Owner'];
		$add=$_POST['add'];
		$CVV=$_POST['CVV'];
		$cno=$_POST['cno'];
		$Month=$_POST['Month'];
		$Year=$_POST['year'];
		

		$sql="INSERT INTO `payment`(`owner`, `address`, `CVV`, `cardnumber`, `Months`, `years`) VALUES ('".$owner."','".$add."','".$CVV."','".$cno."','".$Month."','".$Year."')";


		$res=mysqli_query($db,$sql);

		if(!$res)
		{
				echo " you have not successfully Payment";
		}
		else
		{
       		echo "<script type='text/javascript'>
       		 window.location.href='http://localhost/example/shooping/user/uhome.html'</script>";
       	   	 exit();
		}

	}
}
else
{
	echo "error";
}
?>