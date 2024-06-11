<?php include 'customerheader.php';

	$cid=$_SESSION['cust_id'];
extract($_GET);


if (isset($_POST['add'])) {
	extract($_POST);

	echo$data=$quantity;
	echo$stock=$stock;



	if ($stock < $quantity ) {

		alert('Enter Less Quantity');
	}
else{


	echo$q2="select * from tbl_cartmaster where cust_id='$cid' and status='pending'";
	$res=select($q2);
	if (sizeof($res)>0) {
		$cmid=$res[0]['cart_master_id'];
	}else{

	echo$q="insert into tbl_cartmaster values(null,'$cid','$tota','pending')";
	$cmid=insert($q);

	echo$q1="insert into tbl_order values(null,'$cmid',curdate())";
	insert($q1);
	$q3="insert into tbl_cartchild values(null,'$cmid','$iid','$quantity',curdate(),'$tota','$gram')";
	insert($q3);

	

	alert('successfuly');
	return redirect('customer_makeorder.php');
 }
  echo$q4="select * from tbl_cartchild where item_id='$iid' and cart_master_id='$cmid' ";
  $res2=select($q4);


  if (sizeof($res2)>0) {
  	$cdid=$res2[0]['cart_child_id'];

  	  $a=$res2[0]['qty'];
  $b=$quantity;

  $c=$a+$b;
     if ($c > $stock) {
     	alert('Out Of Stock');
     }else{



  	echo$q5="update tbl_cartchild set qty=qty+'$quantity' , gram=gram+'$gram' , total_price=total_price+'$tota' where cart_child_id='$cdid' ";
  	update($q5);


  	
  }
}else{
  	
echo$q3="insert into tbl_cartchild values(null,'$cmid','$iid','$quantity',curdate(),'$tota','$gram')";
	insert($q3);


	

	
	}

	echo$qm="update tbl_cartmaster set total_amount=total_amount+'$tota' where cart_master_id='$cmid' ";
update($qm);



	alert('successfuly');
	return redirect('customer_makeorder.php');

}

}
 ?>




<center>
 <script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		var z=document.getElementById("p_gram").value;
		document.getElementById("t_amount").value = x * y * z;
	}

</script> 
 <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 700px">
    <div class="hero-container">
<center>
<h1>Add To Cart</h1>
<form method="post" >
	<table class="table" style="width:500px;color: white">

		<tr>
			<th>Today Gold Rate</th>
			<td><select id="p_amount" class="form-control">
			
				<?php 
                    $q="select * from tbl_rate where `date`=curdate()";
                    $res5=select($q);

                    foreach ($res5 as $key) {?>
                    	<option ><?php echo $key['price'] ?></option>
                   <?php 
                    }
				 ?>
			</select></td>
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
			<td><input type="number" required="" class="form-control"  id="t_amount" name="tota"></td>
		</tr>

		<td align="center" colspan="2"><input type="submit" name="add" value="submit" class="btn btn-success"></td>
	</table>
</form>
</center>
 </div></section>
<?php include 'footer.php' ?>