<?php include 'adminheader.php';
extract($_GET);


if (isset($_POST['purchase'])) {
	extract($_POST);

	 $it=$_POST['item'];
	// print_r($it);

	// var_dump($it);



	$string = 'Welcome to the India.'; // a string
	$arrayString=  explode("&", $it ); // split string with space (white space) as a delimiter.
	// Print_r($arrayString[0]); // printing the output array…
	$its=$arrayString[0];
	// var_dump($its);
	// echo implode($its);



	$q2="select * from tbl_purchase_master where vendor_id='$vendor' and status='pending'";
	$res=select($q2);
	if (sizeof($res)>0) {
		$pmid=$res[0]['pur_master_id'];



	}else{

	$q="insert into tbl_purchase_master values(null,'$cid','$vendor',curdate(),'0','pending')";
	$pmid=insert($q);
	// $q3="insert into tbl_purchase_child values(null,'$pmid','$its','$quantity','$total','$gram')";
	// insert($q3);
	// $q="update tbl_item set stock=stock+'$quantity' where item_id='$its'";
	// update($q);

	// alert('successfuly');
	// return redirect('admin_managepurchase.php');
 }
  $q4="select * from tbl_purchase_child where item_id='$its' and pur_master_id='$pmid' ";
  $res2=select($q4);

  if (sizeof($res2)>0) {
  	$pcid=$res2[0]['pur_child_id'];

  	$q5="update tbl_purchase_child set quantity=quantity+'$quantity', cost_price=cost_price+'$total', gram=gram+'$gram' where pur_child_id='$pcid' ";
  	update($q5);
  	
  }else{
  	
$q3="insert into tbl_purchase_child values(null,'$pmid','$its','$quantity','$total','$gram')";
	insert($q3);

	
	}

	$q6="update tbl_purchase_master set tot_amount=tot_amount+'$total' where pur_master_id='$pmid' ";
	update($q6);
	// $q="update tbl_item set stock=stock+'$quantity' where item_id='$its'";
	// update($q);

	// alert('successfuly');
	// return redirect('admin_managepurchase.php');

}





if (isset($_GET['pid'])) {
	extract($_GET);

	$qe="update  tbl_purchase_master set status='paid' where pur_master_id='$pid'";
	update($qe);

	$q4="SELECT * FROM tbl_purchase_child where pur_master_id='$pid'";
$res=select($q4);


foreach ($res as $key) {

  echo$iid= $key['item_id'] ;

 echo$qty=$key['quantity'];

$q="update tbl_item set stock=stock+'$qty' where item_id='$iid'";
	update($q);

}

}
 ?>

 <script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		var z =document.getElementById("p_gram").value;
		
		document.getElementById("t_amount").value = x * y * z;
	}
		function TextOnTextChanges()
	{
		
		var a =document.getElementById("gm").value;
		const myArray = a.split("&");
		// alert(myArray[1]);
		document.getElementById("p_gram").value=myArray[1];
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
			<th>Item</th>
			<td><select  class="form-control" required="" id="gm" name="item" onchange="TextOnTextChanges()">
				<option>--Select--</option>
				
				<?php 
                    $q9="select * from tbl_item ";
                    $res2=select($q9);

                    foreach ($res2 as $key) {?>
                    	<option value="<?php echo $key['item_id'] ?>&<?php echo $key['gram']?>" ><?php echo $key['item_name'] ?> gram(<?php echo $key['gram']?>)  </option>
                   <?php 
                    }
				 ?>
			</select></td>
		</tr>

		
		<tr>
			<tr>
			<th>Gold Rate Today</th>
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

		

		
		
		
		<tr>   
		  <th>Weight(g)</th>    
		   <td><input type="number" required="" class="form-control" readonly  id="p_gram" onchange="TextOnTextChange()"name="gram" placeholder="Weight in grams"></td> 
		</tr>

		<tr>
			<th>Quantity</th>
			<td><input type="number" required="" class="form-control"  id="p_qnty" onchange="TextOnTextChange()" name="quantity" placeholder="Quantity"></td>
		</tr>

		<tr>
			<th>Total</th>
			<td><input type="number" required="" class="form-control" id="t_amount" name="total" placeholder="Total Amount"></td>
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
				
			
			
				<th>Date</th>

				
				<th>Item</th>
				
				<th>Quantaty</th>
				<th>Grams</th>
					<th>Total Amount</th>
				
				
			</tr>
			<?php 

     $q="SELECT * FROM tbl_purchase_master inner join tbl_purchase_child using (pur_master_id) inner join tbl_item using (item_id) INNER JOIN tbl_vendor USING (vendor_id)  WHERE tbl_purchase_master.status='pending' and tbl_purchase_master.staff_id='$cid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['vendor_name'] ?></td>
    	
    		
    		<td><?php echo $row['date'] ?></td>	
<td><?php echo $row['item_name'] ?></td>
    		
    		
    		<td><?php echo $row['quantity'] ?></td>
    		<td><?php echo $row['gram'] ?></td>
    		<td><?php echo $row['tot_amount'] ?></td>
    		
    		

    		
    	</tr>
    <?php }
			 ?>


			 <?php 

                if (sizeof($res)>0) {?>
                	<td align="center" colspan="8"><a class=" btn btn-success" href="?pid=<?php echo $row['pur_master_id'] ?>">Confirm Purchase</a></td>
                <?php }
			  ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>