 <?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);





if (isset($_POST['payment'])) {
	extract($_POST);




 $exp_date=$date;
	$cd=date("Y-m");

if ($exp_date < $cd) {


alert('expired'); 
			

}else{





 $q1="insert into tbl_card values(null,'$cid','$num','$name','$date')";
insert($q1);

alert('successfully');

}
}

?>


 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
<center>
<h1>Add Card</h1>
<form method="post">

	<table class="table" style="width:500px;color: white">

		
		<tr>
			<th>Card Number</th>
			<td><input type="number" class="form-control" required="" maxlength="16" pattern="[0-9]{10}" name="num"></td>

		</tr>
		<tr>
		<th>Card name</th>
		<td><input type="text" class="form-control" required=""  name="name"></td>
	</tr>
          
		<tr>
			<th>Expired Date</th>
			<td><input type="month" required="" class="form-control" name="date"></td>
		</tr>
		
		<tr>
		<td align="center" colspan="2"><input type="submit" name="payment" value="submit" class="btn btn-success"></td>
		<td><a class="btn btn-danger" href="customer_makeorder.php">Back</a></td>
		</tr>
	</table>

</form>
</center>
 </div>
  </section><!-- End Hero -->
  <?php include 'footer.php' ?>