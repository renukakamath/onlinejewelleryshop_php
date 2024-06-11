<?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);

 ?>

<!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 200px;color: white">
    <div class="hero-container">
           </div>
  </section><!-- End Hero -->

       <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
         
          <h3>view <span> My Orders</span></h3>


         
         
        </div>
        <div class="row">

      <?php 

     $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_item` USING (item_id) where cust_id='$cid' and status='paid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
 
    
    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="<?php echo $row['item_image'] ?>"  class="img-fluid" alt="">
                <div class="social">
                 
                
                </div>
              </div>
              <div class="member-info">
                <h4>Item Name:<?php echo $row['item_name'] ?></h4>
                 <h4>Date:<?php echo $row['o_date'] ?></h4>
                  <h4>grams: <?php echo $row['gram'] ?></h4>
                   <h4>Quantity: <?php echo $row['qty'] ?></h4>
                   <h4>Amount:<?php echo $row['total_price'] ?></h4>
                   <h4>Status:<?php echo $row['status'] ?></h4>
                    <?php 

                            if ($row['status']=="paid") {?>

                                <h4><a  class="btn btn-success"href="customer_viewpayment.php?oid=<?php echo $row['order_id'] ?>&cmid=<?php echo $row['cart_master_id'] ?>&amo=<?php echo $row['total_amount'] ?>">View Payment</a></h4>

                                 <a class="btn btn-danger" href="bill.php?cmid=<?php echo $row['cart_master_id'] ?>">print</a>

                             
                          <?php   }

                            ?>
    
              </div>
            </div>
          </div>
        



    <?php }

       ?>
       </div>
      </div>
    </section>
<?php include 'footer.php' ?>