
<?php include 'adminheader.php';


if (isset($_POST['staffreg'])) {
	extract($_POST);
	$q1="select * from tbl_login where username='$uname' and password='$pwd'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('already exist');
 		}else{
    $q="insert into tbl_login values('$uname','$pwd','Staff','Active')";
     insert($q);
  $q1="insert into tbl_staff values(null,'$uname','$fname','$lname','$address','$city','$district','$pin','$num','$gen','$date','$datejoin','Active') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_managestaff.php');
}
}

if (isset($_GET['iid'])) {
	extract($_GET);

	$q="update tbl_login set status='InActive' where username='$iid'";
	update($q);
	$q1="update tbl_staff set status='InActive' where username='$iid'";
	update($q1);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_login set status='Active' where username='$aid'";
	update($q);
	$q1="update tbl_staff set status='Active' where username='$aid'";
	update($q1);
}


if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_staff where staff_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_staff set staff_fname='$fname' ,staff_lname='$lname',staff_hname='$address',staff_city='$city',staff_dist='$district',staff_pin='$pin',staff_phone='$num',staff_gender='$gen',date='$date'where staff_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_managestaff.php');

 }




?>
 <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 1000px">
    <div class="hero-container">
<center>
	<h3>ADD STAFF</h3>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>First Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_fname'] ?>" name="fname" placeholder="First Name"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_lname'] ?>" name="lname" placeholder="Last Name"></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td><input type="radio" required=""  name="gen" value="female">Female
			<input type="radio" required=""  name="gen" value="male">Male</td>
		</tr>
		<tr>
			<th>Date of Birth</th>
			<td><input type="date" required="" class="form-control" value="<?php echo $res[0]['date'] ?>" name="date"></td>
		</tr>
		<tr>
			<th>Address</th>
			<td><textarea class="form-control" required="" name="address" placeholder="Address"><?php echo $res[0]['staff_hname'] ?></textarea></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" required="" value="<?php echo $res[0]['staff_city'] ?>" class="form-control" name="city" placeholder="City"></td>
		</tr>
		<tr>
			<th>District</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_dist'] ?>" name="district" placeholder="District"></td>
		</tr>
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control" value="<?php echo $res[0]['staff_pin'] ?>" name="pin" placeholder="Pincode"></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" value="<?php echo $res[0]['staff_phone'] ?>" class="form-control" name="num" placeholder="Phone Number"></td>
		</tr>
		<tr>
			<th>Date Joined</th>
			<th><input type="date" required="" class="form-control" value="<?php echo $res[0]['datejoin']?>" name="datejoin"></th>
		</tr>
		

		<td align="center" colspan="2"><input type="submit" name="update" value="UPDATE" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
		<table class="table" style="width:500px;color: white">
		<tr>
			<th>First Name</th>
			<td><input type="text" required="" class="form-control" name="fname" placeholder="First Name"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required="" class="form-control" name="lname" placeholder="Last Name"></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td><input type="radio" class="btn btn-success" required=""  name="gen" value="female">Male
			<input type="radio" class="btn btn-success" required=""  name="gen" value="male">Female
			<input type="radio" required=""  class="btn btn-success" name="gen" value="other">Others</td>
			</td>
		</tr>
		<tr>
			<th>Date</th>
			<td><input type="date" required="" class="form-control" name="date"></td>
		</tr>
		<tr>
			<th>Address</th>
			<td><textarea class="form-control" required="" name="address" placeholder="Address"></textarea></td>
		</tr>
		
		<tr>
			<th>City</th>
			<td><input type="text" required="" class="form-control" name="city" placeholder="City"></td>
		</tr>
		<tr>
			<th>District</th>
			<td><input type="text" required="" class="form-control" name="district" placeholder="District"></td>
		</tr>
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control" name="pin" placeholder="Pincode"></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" class="form-control" name="num" placeholder="Phone Number"></td>
		</tr>
		<tr>
			<th>Date Joined</th>
			<th><input type="date" required="" class="form-control"  name="datejoin"></th>
		</tr>
		

		<tr>
			<th>Username</th>
			<td><input type="email" required="" class="form-control"  name="uname" placeholder="Enter email of the staff"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" class="form-control" name="pwd" placeholder="Create Password For Staff"></td>
		</tr>
		<td align="center" colspan="2"><input type="submit" name="staffreg" value="SUBMIT" class="btn btn-success"></td>
	</table>
<?php } ?>
	</form>
</center>
</div></section>
<center>
	<h1>VIEW STAFF</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>SNo</th>
			   <th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
				<th>DOB</th>
				<th>Address</th>
				
			     <th>City</th>
				<th>District</th>
				<th>Pincode</th>
				<th>Phone</th>
				<th>Date Joined</th>
				
			
			

				
			</tr>
			<?php 

     $q="select * from tbl_staff inner join tbl_login using (username) ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['staff_fname'] ?></td>
    		<td><?php echo $row['staff_lname'] ?></td>
			<td><?php echo $row['staff_gender'] ?></td>
    		<td><?php echo $row['date'] ?></td>
    		<td><?php echo $row['staff_hname'] ?></td>
    		
    		<td><?php echo $row['staff_city'] ?></td>
    		<td><?php echo $row['staff_dist'] ?></td>
    	
    		<td><?php echo $row['staff_pin'] ?></td>
    		<td><?php echo $row['staff_phone'] ?></td>
			<td><?php echo $row['datejoin']?></td>
    	

    		<?php if ($row['status']=="Active") {
    			?>

            <td><a class="btn btn-success" href="?iid=<?php echo $row['username'] ?>">INACTIVE</a></td>
           

    		<?php 
    		}elseif ($row['status']=="InActive") {
    			?>
    			<td><a class="btn btn-success" href="?aid=<?php echo $row['username'] ?>">ACTIVE</a></td>
    		<?php 
    		} ?>
    		   <td><a class="btn btn-success" href="?uid=<?php echo $row['staff_id'] ?>">UPDATE</a></td>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>