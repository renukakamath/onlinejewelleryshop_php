<?php include 'adminheader.php';
extract($_GET);



 ?>
   <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 200px">
    <div class="hero-container">
    </div></section>
<center>
	<h1>VIEW SALES</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>SNo</th>
                <th>Customer</th>
			   <th>Date</th>
			     <th>Product</th>
           <th>Weight(g)</th>
				<th>Quantity</th>
                <th>Price</th>
                <th>Status</th>

			</tr>
			<?php 

     $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_item` USING (item_id)  INNER JOIN tbl_customer USING (cust_id) ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
            <td><?php echo $row['cust_fname'] ?></td>
    		<td><?php echo $row['o_date'] ?></td>
    		<td><?php echo $row['item_name'] ?></td>
        <td><?php echo $row['gram'] ?></td>
    		<td><?php echo $row['qty'] ?></td>
                <td><?php echo $row['total_amount'] ?></td>
    	
    		<td><?php echo $row['status'] ?></td>
            <td><a class="btn btn-success" href="admin_viewpayment.php?oid=<?php echo $row['order_id'] ?>">VIEW PAYMENT</a></td>
    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>