<?php include 'customerheader.php';

$cid=$_SESSION['cust_id'];
extract($_GET);

 ?>

<!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 200px">
    <div class="hero-container">
           </div>
  </section><!-- End Hero -->

      <center>
<center>
	<h1>Cart View</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   
				<th>Total Amount</th>
				
			
                <th>Status</th>
				
			</tr>
			<?php 

     $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`) INNER JOIN tbl_cartchild USING (cart_master_id)INNER JOIN `tbl_item`USING (item_id)  where cust_id='$cid' and status='pending' GROUP BY order_id";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {

   

      ?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
   
    		<td><?php echo $row['total_amount'] ?></td>
    	
    	
    		<td><?php echo $row['status'] ?></td>

    		<td><a class="btn btn-success" href="customer_buy.php?oid=<?php echo $row['order_id'] ?>&cmid=<?php echo $row['cart_master_id'] ?>">Cart Details</a></td>


        





    		<?php 

               if ($row['status']=="pending") {?>
              <td><a  class="btn btn-success"href="customer_makepayment.php?oid=<?php echo $row['order_id'] ?>&cmid=<?php echo $row['cart_master_id'] ?>&amo=<?php echo $row['total_amount'] ?>&stock=<?php echo $row['stock']?>&qty=<?php echo $row['qty'] ?>">Make Payment</a></td>
            

 
              <?php 
               }

    		 ?>
    		
           
    		
           
    		

    
    	</tr>
    	
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>