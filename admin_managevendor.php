<?php include 'adminheader.php';


if (isset($_POST['vendor'])) {
	extract($_POST);
    
  $q1="insert into tbl_vendor values(null,'$fname','$email','$city','$district','$pin','$num','Active') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_managevendor.php');
 }
 if (isset($_GET['iid'])) {
	extract($_GET);

	$q="update tbl_vendor set status='InActive' where vendor_id='$iid'";
	update($q);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_vendor set status='Active' where vendor_id='$aid'";
	update($q);
}
if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_vendor where vendor_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_vendor set vendor_name='$fname' ,vendor_phone='$num' ,vendor_email='$email',vendor_city='$city' ,vendor_dist='$district' ,vendor_pin='$pin' ,vendor_phone='$num' where vendor_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_managevendor.php');

 }
 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 700px">
    <div class="hero-container">
<center>
<h1>ADD VENDOR</h1>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['vendor_name'] ?>" name="fname" placeholder="Vendor Name"></td>
		</tr>
		
		
		
		<tr>
			<th>E-Mail</th>
			<td><input type="email" required="" class="form-control" value="<?php echo $res[0]['vendor_email'] ?>" name="email" placeholder="Vendor Email"></td>
		</tr>
			<tr>
			<th>City</th>
			<td><input type="text" required="" value="<?php echo $res[0]['vendor_city'] ?>" class="form-control" name="city" placeholder="Vendor City"></td>
		</tr>
		<tr>
			<th>District</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['vendor_dist'] ?>" name="district" placeholder="Vendor District"></td>
		</tr>
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control" value="<?php echo $res[0]['vendor_pin'] ?>" name="pin" placeholder="Vendor Pincode"></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" class="form-control" value="<?php echo $res[0]['vendor_phone'] ?>"  name="num" placeholder="Vendor Phone No"></td>
		</tr>
		
		<td align="center" colspan="2"><input type="submit" name="update" value="UPDATE" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" name="fname" placeholder="Vendor Name"></td>
		</tr>
		
		
		
		<tr>
			<th>E-Mail</th>
			<td><input type="email" required="" class="form-control" name="email" placeholder="Vendor Email"></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" required="" class="form-control" name="city" placeholder="Vendor City"></td>
		</tr>
		<tr>
			<th>District</th>
			<td><input type="text" required="" class="form-control" name="district" placeholder="Vendor District"></td>
		</tr>
		
		
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control" name="pin" placeholder="Vendor Pincode"></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" class="form-control" name="num" placeholder="Vendor Phone No"></td>
		</tr>
		
		<td align="center" colspan="2"><input type="submit" name="vendor" value="SUBMIT" class="btn btn-success"></td>
	</table>
<?php } ?>
</form>
</center>
</div></section>
<center>
	<h1>VIEW VENDOR</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>SNo</th>
				<th>Name</th>
			
				<th>Email</th>
				 <th>City</th>
				<th>District</th>
				<th>Pincode</th>
				<th>Phone</th>
				<th>Status</th>
				
				
			</tr>
			<?php 

     $q="select * from tbl_vendor";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['vendor_name'] ?></td>
    		

    		<td><?php echo $row['vendor_email'] ?></td>
    		<td><?php echo $row['vendor_city'] ?></td>
    		<td><?php echo $row['vendor_dist'] ?></td>
    		<td><?php echo $row['vendor_pin'] ?></td>
    		<td><?php echo $row['vendor_phone'] ?></td>
    		<td><?php echo $row['status'] ?></td>

    		<?php 

              if ($row['status']=="Active") {?>
              <td><a class="btn btn-success" href="?iid=<?php echo $row['vendor_id'] ?>">INACTIVE</a></td>
            
             <?php }elseif ($row['status']=="InActive") {?>
             	<td><a class="btn btn-success" href="?aid=<?php echo $row['vendor_id'] ?>">ACTIVE</a></td>
             <?php }?>
      <td><a class="btn btn-success" href="?uid=<?php echo $row['vendor_id'] ?>">UPDATE</a></td>
             
    	</tr>
    <?php }

			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>