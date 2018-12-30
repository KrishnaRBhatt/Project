<?php
$user='root';
$pas='';
$db='jewellery';

$db=new mysqli('localhost',$user,$pas,$db) or die("unable to connect");

if($db)
{
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$pass=$_POST['pass'];

		$sql="SELECT *  FROM `admin` WHERE email='".$email."' AND  password='".$pass."'";

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

       		 echo "<script type='text/javascript'>
       		 window.location.href='http://localhost/example/shooping/admin/index.html?id=<?php echo $email; ?>'</script>";
       	   	 exit();
		}
	}
}
else
{
	echo "error";
}
?>