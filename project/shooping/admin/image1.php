<!DOCTYPE html>
<?php
$user='root';
$pas='';
$db='jewellery';

$db=new mysqli('localhost',$user,$pas,$db) or die("unable to connect");

if($db)
{

	if(isset($_POST['submit']))
	{	

		$name=$_POST['name'];
		$code=$_POST['code'];
		$image=$_POST['img'];
		$price=$_POST['price'];
		

		$sql="INSERT INTO `tblproduct`(`name`, `code`, `image`, `price`) VALUES ('".$name."','".$code."','".$image."','".$price."')";

		$result=mysqli_query($db,$sql);


		if(!$result)
		{
				echo " you have not successfully uploadimage";
		}
		else
		{
       		echo "<script type='text/javascript'>
       		 window.location.href='http://localhost/example/shooping/admin/index.html'</script>";
       	   	 exit();
		}

	}
}
else
{
	echo "error";
}
?>