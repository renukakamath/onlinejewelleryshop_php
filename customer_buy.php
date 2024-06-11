<?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);



 $q1="SELECT * FROM `tbl_cartmaster` INNER JOIN `tbl_cartchild` USING(`cart_master_id`)  INNER JOIN `tbl_item` USING(`item_id`) WHERE `cust_id`='$cid' AND `status`='Pending'";
$res1=select($q1);
$qq="SELECT *,COUNT(`cart_child_id`) AS cart_count,SUM(`total_price`) AS ttamount FROM `tbl_cartmaster` INNER JOIN `tbl_cartchild` USING(`cart_master_id`)  WHERE `cust_id`='$cid' AND `status`='Pending'";
$rr=select($qq);

if(isset($_GET['remove_item'])){
    extract($_GET);
     $qu="UPDATE `tbl_cartmaster` SET `total_amount`=`total_amount`-'$amount' WHERE `cart_master_id`='$cart_mid'";
    update($qu);
     $qd="DELETE FROM `tbl_cartchild` WHERE `item_id`='$remove_item' AND `cart_master_id`='$cart_mid'";
    delete($qd);

     $g="select * from  tbl_cartmaster where cart_master_id='$cart_mid' and total_amount='0'";
    $hg=select($g);
    if(sizeof($hg)>0)
    {
       $j="delete from tbl_cartmaster where cart_master_id='$cart_mid'";
        delete($j);
        
    }


    alert("Successfully Removed");
    return redirect("customer_makeorder.php");

}






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
         
          <h3>view <span>Orders</span></h3>
         
        </div>
        <div class="row">
    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
      <?php 

     $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_item` USING (item_id) where cust_id='$cid' and cart_master_id='$cmid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {

      $qty= $row['qty'];

 $total= $price;


    $tot= $qty*$total;
?>
 
    

            <div class="member col-lg-12" style="margin-left: 20px">
              <div class="member-img">
                <img src="<?php echo $row['item_image'] ?>"  class="img-fluid" alt="">
                <div class="social">
                 
                
                </div>
              </div>
              <div class="member-info">
                <h4>Item Name:<?php echo $row['item_name'] ?></h4>
                 <h4>Date:<?php echo $row['o_date'] ?></h4>
                 
                  <h4>Grams: <?php echo $row['gram'] ?></h4>
                  <h4>Quantity: <?php echo $row['qty'] ?></h4>
                   <h4>Amount:<?php echo $tot ?></h4>


                    <h4><a type="button"  href="?remove_item=<?php echo $row['item_id']; ?>&cart_mid=<?php echo $row['cart_master_id']; ?>&amount=<?php echo $row['total_price']; ?>"/>Remove</h4>
    
              </div>
            </div>
         
    <?php }

       ?>
        </div>
      </div>
    </section>



<?php include 'footer.php' ?>