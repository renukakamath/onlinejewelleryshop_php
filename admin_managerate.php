<?php include 'adminheader.php';


if (isset($_POST['rate'])) {
	extract($_POST);


	$q2="select * from  tbl_rate where date=curdate()";
	$res=select($q2);

	if(sizeof($res)>0){

		alert('already exist');

	}else{
	



    
  $q1="insert into tbl_rate values(null,'$cid','$price',curdate()) ";
   insert($q1);
   alert('sucessfully');
   return redirect("admin_managerate.php?cid=$cid");
 }
}

  if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_rate where rate_id='$uid'";
 	$res1=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_rate set price='$price' where rate_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect("admin_managerate.php?cid=$cid");

 }





 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 700px">
    <div class="hero-container">
<center>
<h1>ADD RATE </h1>
<form method="post">
	<?php   if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">

		<tr>
			
			<th>Gram</th>
			<td><input type="text" value="1 Gram" class="form-control" disabled="" name="gram"></td>
		</tr>
		
		<tr>
			<th>Gold Rate Today</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res1[0]['price'] ?>" name="price"></td>
		</tr>
		
		
		
		
		<td align="center" colspan="2"><input type="submit" name="update" value="UPDATE" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			
			<th>Gram</th>
			<td><input type="text" value="1 Gram" class="form-control" disabled="" name="gram"></td>
		</tr>
		<tr>
			<th>Gold Rate Today</th>
			<td><input type="text" required="" class="form-control"  name="price" placeholder="Today's Gold Rate"></td>
		</tr>
		<td align="center" colspan="2"><input type="submit" name="rate" value="SUBMIT" class="btn btn-success"></td>
	</table>
<?php } ?>
</form>
</center>
</div></section>
<center>
	<h1>VIEW RATE</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>SNo</th>
				
				<th>Gold Rate Today</th>
				<th>Date</th>
				
				
				
			</tr>
			<?php 

     $q="select * from tbl_rate where staff_id='$cid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		
    		<td><?php echo $row['price'] ?></td>
    		<td><?php echo $row['date'] ?></td>
    	
    	
      <td><a class="btn btn-success" href="?uid=<?php echo $row['rate_id'] ?>">UPDATE</a></td>
             
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>