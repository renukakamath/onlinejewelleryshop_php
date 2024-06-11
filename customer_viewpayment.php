<?php include 'customerheader.php';
extract($_GET);


 ?>



 <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 200px">
    <div class="hero-container">
    </div></section>
<center>
	<h1>view Payment</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   <th>Card Name</th>
				<th>Amount</th>	
			     <th>Order Date</th>		
			</tr>
			<?php 

     $q="SELECT * FROM `tbl_payment` INNER JOIN `tbl_card` USING (`card_id`)  INNER JOIN `tbl_order` USING (`order_id`)INNER JOIN`tbl_cartmaster` USING (`cart_master_id`)  where order_id='$oid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['card_name'] ?></td>
    		<td><?php echo $row['payment_amt'] ?></td>	
    		<td><?php echo $row['o_date'] ?></td>
    	</tr>
    <?php }

			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>