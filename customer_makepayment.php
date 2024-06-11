<?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);


if($stock < $qty )
{
	alert('out of stock');
	return redirect('customer_myorders.php');
}else{


if (isset($_POST['payment'])) {
	extract($_POST);




	 $exp_date=$date;
	 $cd=date("Y-m");

if ($exp_date < $cd) {


alert('expired'); 
			

}else{





// $q1="insert into tbl_card values(null,'$cid','$num','$name','$date')";
// $id=insert($q1);
$q="insert into tbl_payment values(null,'$oid','$id','$amo',curdate())";
insert($q);
$q2="update tbl_cartmaster set status='paid' where cart_master_id='$cmid'";
update($q2);


$q4="SELECT * FROM tbl_cartchild where cart_master_id='$cmid'";
$res=select($q4);


foreach ($res as $key) {

  $iid= $key['item_id'] ;

 $qty=$key['qty'];

$q6="update tbl_item set stock=stock-'$qty' where item_id='$iid'";
update($q6);


alert('successfully');

return redirect('customer_myorders.php');

}


}
}
}
 ?>
 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
<center>
<h1>Make Payment</h1>
<form method="post">

	<table class="table" style="width:500px;color: white">

		
		<tr>
			<th>Card Number</th>
			<td><SELECT class="form-control" required name="id">
				<OPTION>--Select--</OPTION>
				<?php 
                $m="select * from tbl_card where cust_id='$cid'";
                $res1=select($m);
                foreach ($res1 as $key) {?>
                	<option value="<?php echo $key['card_id'] ?>"><?php echo $key['card_no'] ?>  <?php echo $key['card_name'] ?></option>
              <?php   }

				 ?>
			</SELECT>
			</td>

			<td><a class="btn btn-danger" href="savecard.php">Add Card</a></td>
		</tr>
		
           <tr>
			<th>C V V</th>
			<td><input type="password" required="" title="Enter 3 Digits" pattern="[0-9]{3}" class="form-control" name="cvv"></td>
		</tr>
		<tr>
			<th>Expired Date</th>
			<td><input type="month" required="" class="form-control" name="date"></td>
		</tr>

		
	<tr>
		<th>Amount</th>
		<td><input type="text" class="form-control" value="<?php echo $amo ?>" name="amo"></td>
	</tr>
		
		<tr>
		<td align="center" colspan="2"><input type="submit" name="payment" value="submit" class="btn btn-success"></td>
		</tr>
	</table>

</form>
</center>
 </div>
  </section><!-- End Hero -->
<?php include 'footer.php' ?>