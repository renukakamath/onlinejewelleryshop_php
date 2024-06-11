<?php include 'adminheader.php';
extract($_GET);


 ?>

 <script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		var z =document.getElementById("p_gram").value;
		document.getElementById("t_amount").value = x * y * z;
	}

</script> 

	 <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 200px">
    <div class="hero-container">


</div></section>
<center>
	<h1>VIEW PURCHASE</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>SNo</th>
				<th>Item</th>
				<th>Cost Price</th>
				<th>Quantaty</th>
				<th>Grams</th>
				
				<th>Date</th>	
			</tr>
			<?php 

     $q="select * from tbl_purchase_child inner join tbl_purchase_master using (pur_master_id) inner join tbl_vendor using (vendor_id) inner join tbl_item using (item_id) where  tbl_purchase_master.status='paid' and   tbl_purchase_master.staff_id='$cid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		
    		<td><?php echo $row['item_name'] ?></td>
    		
    		<td><?php echo $row['cost_price'] ?></td>
    		<td><?php echo $row['quantity'] ?></td>
    		<td><?php echo $row['gram'] ?></td>
    		
    		<td><?php echo $row['date'] ?></td>	
    	</tr>
    <?php }
			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>