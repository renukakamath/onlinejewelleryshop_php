<?php include 'adminheader.php';
extract($_GET);


if (isset($_POST['purchase'])) {
	extract($_POST);
    
	 	
echo$q1="insert into tbl_purchase_master values(null,'$cid','$vendor',curdate(),'$total') ";
   $id=insert($q1);
   echo$q1="insert into tbl_purchase_child values(null,'$id','$iid','$quantity','$rate') ";
   insert($q1);
   echo$q3="update tbl_item set stock=stock+'$quantity' where item_id='$iid'";
   update($q3);
   alert('sucessfully');
   return redirect("singlepurchase.php?rate=$rate&iid=$iid");
 }
	





 ?>

 <script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		document.getElementById("t_amount").value = x * y;
	}

</script> 
<center>
	 <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 700px">
    <div class="hero-container">
<h1>ADD PURCHASE</h1>
<form method="post" >
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Vendor</th>
			<td><select name="vendor" class="form-control">
				<option>Select</option>
				<?php 

				$q="select * from tbl_vendor where status='Active'";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['vendor_id'] ?>"><?php echo $row['vendor_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<tr>
			<th>Today Gold Rate</th>
			<td><select id="p_amount" class="form-control" required="" name="rate">
				<?php 
                    $q="select * from tbl_rate where `date`=curdate()";
                    $res=select($q);

                    foreach ($res as $key) {?>
                    	<option ><?php echo $key['price'] ?></option>
                   <?php 
                    }
				 ?>
			</select></td>
		</tr>

		</tr>
		<tr>
			<th>Grams</th>
			<td><input type="number" required="" class="form-control" value="<?php echo $gram ?>"  id="p_gram" onchange="TextOnTextChange()" name="gram"></td>
		</tr>
		
		<tr>
			<th>Quantity</th>
			<td><input type="number" required="" class="form-control"  id="p_qnty" onchange="TextOnTextChange()" name="quantity"></td>
		</tr>

		<tr>
			<th>Total</th>
			<td><input type="number" required="" class="form-control" id="t_amount" name="total"></td>
		</tr>


		<td align="center" colspan="2"><input type="submit" name="purchase" value="SUBMIT" class="btn btn-success"></td>
	</table>
</form>
</center>
</div></section>
<center>
	<h1>VIEW PURCHASE</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>SNo</th>
				<th>Vendor</th>
				<th>Product </th>
				<th>Cost Price</th>
				<th>Quantity</th>
				<th>Total</th>
				<th>Date</th>	
			</tr>
			<?php 

     $q="select * from tbl_purchase_child inner join tbl_purchase_master using (pur_master_id) inner join tbl_vendor using (vendor_id) inner join tbl_item using (item_id) where item_id='$iid' and tbl_purchase_master.staff_id='$cid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['vendor_name'] ?></td>
    		<td><?php echo $row['item_name'] ?></td>
    		
    		<td><?php echo $row['cost_price'] ?></td>
    		<td><?php echo $row['quantity'] ?></td>
    		<td><?php echo $row['tot_amount'] ?></td>
    		<td><?php echo $row['date'] ?></td>	
    	</tr>
    <?php }
			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>