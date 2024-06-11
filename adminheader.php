<?php include 'connection.php' ;

$user_type=$_SESSION['user_type'];



extract($_GET);

if ($user_type=="Staff") {

	$cid=$_SESSION['staff_id'];

}else if ($user_type=="admin") {

	$cid="0";
}




?>
<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body> -->

<!-- <?php 
	if ($user_type=="admin") { ?> -->
<!-- 
	<a href="admin_managestaff.php">Manage Staff</a>  -->

<!-- <?php  }
 ?> 
	 -->
	<!--  <a href="admin_managestaff.php">Manage Staff</a> 
	<a href="admin_managevendor.php"> Manage Vendor</a>
		<a href="admin_managedesign.php">Manage Design</a>
		<a href="admin_managecategory.php">Manage category</a>
		<a href="admin_managesubcategory.php">Manage subcategory</a>
	
		<a href="admin_manageproduct.php">Manage product</a>
		<a href="admin_managepurchase.php">Manage Purchase</a>
		<a href="admin_viewcustomer.php"> View customer</a>
		<a href="admin_viewsales.php">View Sales</a>
		<a href="public_login.php">Logout</a> -->


		 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Online Jewellery Shop</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Tempo - v4.9.1
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">GOLD GALORE</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="admin_home.php">HOME</a></li>

          <?php 
	if ($user_type=="admin") { ?>

	 <li><a class="nav-link scrollto" href="admin_managestaff.php">MANAGE STAFF</a></li>

 <?php  }
 ?>
         
         <!--  <li><a class="nav-link scrollto" href="customer_registration.php">Registration</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
         
         <li class="dropdown"><a href="#"><span>MANAGE</span> <i class="bi bi-chevron-down"></i></a>
             <ul>
             
                 
                  <li><a href="admin_managevendor.php">VENDOR</a></li>
                  <li><a href="admin_managerate.php">RATE</a></li>
                 
                  <li><a href="admin_managecategory.php">CATEGORY</a></li>
                   <li><a href="admin_managedesign.php">DESIGN</a></li>
                  
                  <li><a href="admin_manageproduct.php">PRODUCT</a></li>
                   <li><a href="admin_managepurchase.php">PURCHASE</a></li>
                
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>VIEW</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="admin_viewcustomer.php">CUSTOMER</a></li>
                  <li><a href="admin_viewsales.php">SALES</a></li>
                 <!--  <li><a href="purchase.php">PURCHASE</a></li> -->
                 
                
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>REPORT</span> <i class="bi bi-chevron-down"></i></a>
             <ul>
          
           <li><a class="nav-link scrollto" href="salesreport.php">SALES</a></li>
             </ul>
          <li><a class="nav-link scrollto" href="public_login.php">LOGOUT</a></li>
        </ul> 
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
