<?php include 'connection.php' ;

  $cid=$_SESSION['cust_id'];
  extract($_GET);


?>
<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="customer_home.php">Home</a>
		<a href="customer_searchproduct.php">Search Product</a>
	    <a  href="customer_makeorder.php">Cart</a>
         <a href="customer_myorders.php">My Orders</a>
	<a href="public_login.php">logout</a>

 -->

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

      <h1 class="logo"><a href="index.html">Shop Now</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="customer_home.php">Home</a></li>

      
         
          <li><a class="nav-link scrollto" href="customer_searchproduct.php">Search Product</a></li>
        

           <?php 

           $q="select * from tbl_rate where `date`=curdate()";
           $res=select($q);

           $_SESSION['price']=$res[0]['price'];
           $price=$_SESSION['price'];


           $q2="select * from tbl_cartchild inner join tbl_cartmaster using (cart_master_id) where cust_id='$cid' and status='pending'";
           $res2=select($q2);
            


           if (sizeof($res2)>0) {

             $q3="select sum(qty) as quty from tbl_cartchild inner join tbl_cartmaster using (cart_master_id) where cust_id='$cid' and status='pending'";

             $res3=select($q3);

             $sumqty=$res3[0]['quty'];


             if (sizeof($res3)>0) {
              

              $result=$price*$sumqty;


              $q5="update tbl_cartmaster set total_amount='$result' WHERE cust_id='$cid' and status='pending'";
              update($q5);


             }

            ?>
              <li><a class="nav-link scrollto " href="customer_makeorder.php">Cart</a></li>
         <?php 
           }

            ?>

          <li><a class="nav-link scrollto" href="customer_myorders.php">My Orders</a></li>
        
          <li><a class="nav-link scrollto" href="public_login.php">Logout</a></li>
        </ul> 
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
