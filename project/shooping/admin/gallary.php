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
				<a href="register.html"><span class="icon-user"></span>Registration</a> 
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
		<!--<img src="assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">-->
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
			 <li><a href="index.html">Home</a></li>
			 <li><a href="login.html">Login</a></li>
			              <li class=""><a href="gallary.php">gallary</a></li>
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
	
?>

<link href="cartstyle.css" type="text/css" rel="stylesheet" />

<link href="img.css" type="text/css" rel="stylesheet" />

<div id="product-grid">
	
	<?php
		$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
		
		if (!empty($product_array)) 
		{ 
			foreach($product_array as $key=>$value)
			{
	?>
			<div class="product-item">
			<form method="post" action="addcart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
				<h3></h3>
		<ul class="thumbnails">
			<li class="span3">
			  <div class="thumbnail">
					
					<a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					<img src="<?php echo $product_array[$key]["image"]; ?>">
					
					<div class="caption cntr">

						<p><div class="product-title"><?php echo $product_array[$key]["name"]; ?></div></p>
						<p><strong><?php echo "$".$product_array[$key]["price"]; ?></strong></p>
						<h4><a class="shopBtn" href="addcart.php" title="add to cart"> Add to cart </a></h4>
						
						<br class="clr">
					</div>
			  </div>
			</li>
		</ul>
				
		</div>
			</form>
				<?php
			}
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




<!-- /container -->


<div class="container">

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
