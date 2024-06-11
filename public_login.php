<?php include 'publicheader.php';



if (isset($_POST['login'])) {
  extract($_POST);

  $q="select * from tbl_login where username='$uname' and password='$pwd'";
  $res=select($q);
  if (sizeof($res)>0) {

           $_SESSION['username']=$res[0]['username'];
           $lid=$_SESSION['username'];

       $_SESSION['user_type']=$res[0]['user_type'];
       $user_type=$_SESSION['user_type'];

    if ($res[0]['user_type']=="admin") {

      return redirect('admin_home.php');
    }elseif ($res[0]['user_type']=="Customer") {

      $q1="select * from tbl_login where username='$uname' and status='InActive'";
    $res1=select($q1);
    if (sizeof($res1)>0) {
      alert('Inactive');
    }else{


      $q2="select * from tbl_customer inner join tbl_login using (username) where username='$lid'";
      $res2=select($q2);
      if (sizeof($res2)>0) {
         $_SESSION['cust_id']=$res2[0]['cust_id'];
                     $cid=$_SESSION['cust_id'];
           return redirect('customer_home.php');


      }
      
    }

    }elseif ($res[0]['user_type']=="Staff") {


       $q1="select * from tbl_login where username='$uname' and status='InActive'";
    $res1=select($q1);
    if (sizeof($res1)>0) {
      alert('Inactive');
    }else{



     $q="select * from tbl_staff inner join tbl_login using (username) where username='$lid'";
     $res=select($q);
     if (sizeof($res)>0) {
        $_SESSION['staff_id']=$res[0]['staff_id'];
      $cid=$_SESSION['staff_id'];
      return redirect('admin_home.php');
    }
     }    
    }
  }else{
    alert('invalid username and password');
  }

}




 ?>

<!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <center>
<h1>Login</h1>
<form method="post">
	<table class="table" style="width:500px;color: white">
		
		<tr>
			<th>Username</th>
			<td><input type="email" required="" class="form-control"  name="uname" placeholder="Enter Your Email"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" class="form-control" name="pwd" placeholder="Enter Your Password"></td>
		</tr>
    
		<td align="center" colspan="2"><input type="submit" name="login" value="SUBMIT" class="btn btn-success"></td>
	</table>
  <a href="customer_registration.php">Don't Have Account? Sign Up</a>
</form>
</center>
    </div>
  </section><!-- End Hero -->
        <!-- ======= About Section ======= -->
		<section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <h3>Learn More <span>About Us</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
          <h3>Call To Action</h3>
          <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a class="cta-btn" href="#">Call To Action</a>
        </div>

      </div>
    </section><!-- End Cta Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <h3>Contact <span>Us</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <!--<div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div>-->

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
<?php include 'footer.php' ?>
