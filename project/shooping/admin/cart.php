<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Mudra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  </head>
<body>
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
				</div>
				<a href="uhome.html"> <span class="icon-home"></span> Home</a> 
				<a href="#"><span class="icon-user"></span> My Account</a> 
				<a href="about_us.html"><span class="icon-user"></span>About Us</a>
				<a href="contact.html"><span class="icon-envelope"></span> Contact us</a>
				<a href="..//home/login.html"><span class="icon-user"></span>Logout</a>
				
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="index.html"><span>Twitter Bootstrap ecommerce template</span> 
		<img src="assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
	<div class="span4">
	<div class="offerNoteWrapper">
	<h1 class="dotmark">
	<i class="icon-cut"></i>
	Mudra Online Shopping Center
	</h1>
	</div>
	</div>
	<div class="span4 alignR">
	<p><br> <strong> Support (24/7) :  7383925197 </strong><br><br></p>
	
	</div>
</div>
</header>

<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			 <li><a href="uhome.html">Home</a></li>
			              <li class=""><a href="gallary.php">Gallary</a></li>
			</ul>
			<form action="#" class="navbar-search pull-left">
			  <input type="text" placeholder="Search" class="search-query span2">
			</form>
			<ul class="nav pull-right">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
				<div class="dropdown-menu">
				<form class="form-horizontal loginFrm">
				  <div class="control-group">
					<input type="text" class="span2" id="inputEmail" placeholder="Email">
				  </div>
				  <div class="control-group">
					<input type="password" class="span2" id="inputPassword" placeholder="Password">
				  </div>
				  <div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Remember me
					</label>
					<button type="submit" class="shopBtn btn-block">Sign in</button>
				  </div>
				</form>
				</div>
			</li>
			</ul>
		  </div>
		</div>
	  </div>
	</div>
<!-- 
Body Section 
-->
	<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li><a href="uhome.html">Home</a> <span class="divider">/</span></li>
			<li class="active">Shopping cart <span class="divider">/</span></li>
			
    	</ul>

    	<h3> Products</h3>	
		<hr class="soft"/>

		<?php
			require_once("dbcontroller.php");
			$db_handle = new DBController();
	if(!empty($_GET["action"])) 
	{
		switch($_GET["action"]) 
		{
			case "add":
			if(!empty($_POST["quantity"])) 
			{
				$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
				$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
				if(!empty($_SESSION["cart_item"]))
				{
					if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) 
					{
						foreach($_SESSION["cart_item"] as $k => $v) 
						{
								if($productByCode[0]["code"] == $k) 
								{
									if(empty($_SESSION["cart_item"][$k]["quantity"])) 
									{
										$_SESSION["cart_item"][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
								}
						}
					} 
					else 
					{
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
					}
				} 
				else 
				{
					$_SESSION["cart_item"] = $itemArray;
				}
			}
			break;

			case "remove":
			if(!empty($_SESSION["cart_item"])) 
			{
				foreach($_SESSION["cart_item"] as $k => $v) 	
				{
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
				}
			}
			break;

			case "empty":
				unset($_SESSION["cart_item"]);
			break;	
		}
	}
?>

<link href="cartstyle.css" type="text/css" rel="stylesheet" />

<div id="shopping-cart">

<?php
if(isset($_SESSION["cart_item"]))
{
		    $total_quantity = 0;
		    $total_price = 0;
	?>	
		<table class="tbl-cart" cellpadding="10" cellspacing="1">
		<tbody>
		<tr>
			<th style="text-align:left;">Name</th>
			<th style="text-align:left;">Code</th>
			<th style="text-align:right;" width="5%">Quantity</th>
			<th style="text-align:right;" width="10%">Unit Price</th>
			<th style="text-align:right;" width="10%">Price</th>
			<th style="text-align:center;" width="5%">Remove</th>
		</tr>	
		<?php		
		    foreach ($_SESSION["cart_item"] as $item)
		    {
		        $item_price = $item["quantity"]*$item["price"];	
		?>
					<tr>
						<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
						<td><?php echo $item["code"]; ?></td>
						<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
						<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
						<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
						<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
					</tr>


						
					<?php
						$total_quantity += $item["quantity"];
						$total_price += ($item["price"]*$item["quantity"]);
}
					?>
					<script type="text/javascript">
						
						function pay()
						{
							window.location.href='http://localhost/example/shooping/user/payment.html';
						}
					</script>

		<tr>
		<td colspan="2" align="right">Total:</td>
		<td align="right"><?php echo $total_quantity; ?></td>
		<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
		<td><input type="submit" name="payment" value="Payment" onclick="pay();"></td>
		</tr>
		</tbody>
		</table>		
		 
		 <?php
} 
else 
{
		?>
	
	<?php 
}
	?>
</div>




    
</div>
</div>

<!--Footer-->

<footer class="footer">
	<div class="row-fluid">
		<div class="span2">
			<h5>Your Account</h5>
			<a href="#">YOUR ACCOUNT</a><br>
			<a href="#">PERSONAL INFORMATION</a><br>
			<a href="#">ADDRESSES</a><br>
			<a href="#">DISCOUNT</a><br>
			<a href="#">ORDER HISTORY</a><br>
 		</div>
		<div class="span2">
			<h5>Iinformation</h5>
			<a href="contact.html">CONTACT</a><br>
			<a href="#">SITEMAP</a><br>
			<a href="#">LEGAL NOTICE</a><br>
			<a href="#">TERMS AND CONDITIONS</a><br>
			<a href="#">ABOUT US</a><br>
 		</div>
		<div class="span2">
			<h5>Our Offer</h5>
			<a href="#">NEW PRODUCTS</a> <br>
			<a href="#">TOP SELLERS</a><br>
			<a href="#">SPECIALS</a><br>
			<a href="#">MANUFACTURERS</a><br>
			<a href="#">SUPPLIERS</a> <br/>
 		</div>
 		
 	</div>
</footer>
</div>

<!-- /container -->


<div class="container">
	<p class="pull-right">
		<a href="#"><img src="assets/img/maestro.png" alt="payment"></a>
		<a href="#"><img src="assets/img/mc.png" alt="payment"></a>
		<a href="#"><img src="assets/img/pp.png" alt="payment"></a>
		<a href="#"><img src="assets/img/visa.png" alt="payment"></a>
		<a href="#"><img src="assets/img/disc.png" alt="payment"></a>
	</p>
	<span>Copyright &copy; 2018<br> Mudra Online Shopping Center</span>
</div>

<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/js/shop.js"></script>
  </body>
</html>
