<?php include 'adminheader.php';

if (isset($_GET['iid'])) {
    extract($_GET);

    $q="update tbl_login set status='InActive' where username='$iid'";
    update($q);
    $q1="update tbl_customer set status='InActive' where username='$iid'";
    update($q1);

}
if (isset($_GET['aid'])) {
    extract($_GET);

    $q="update tbl_login set status='Active' where username='$aid'";
    update($q);
    $q1="update tbl_customer set status='InActive' where username='$aid'";
    update($q1);
}



 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 200px">
    <div class="hero-container">
    

    <center>
       <form method="post">
            <table>
            <tr>
                <th><input type="text" placeholder="search customer" name="ser">
                    <th><input type="submit" class="btn btn-success" name="search"></th></th>
            </tr>
        </table>
       </form>
    </center>
</div></section>
  


<center>

	<h1>VIEW CUSTOMER</h1>
    <h4><a class="btn btn-danger" href="customerreport.php">Print</a></h4>
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
				
			</tr>
			<?php 


            if (isset($_POST['search'])) {
               extract($_POST);

$q="select * from tbl_customer inner join tbl_login using (username) where cust_fname like '$ser%'";
}else{
            

     $q="select * from tbl_customer inner join tbl_login using (username) ";}
     $res=select($q);
     $sino=1;

       $_SESSION['res']=$res;
                $r=$_SESSION['res'];


    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['cust_fname'] ?></td>
    		<td><?php echo $row['cust_lname'] ?></td>
			<td><?php echo $row['cust_gender'] ?></td>
            <td><?php echo $row['dob'] ?></td>
            <td><?php echo $row['cust_house'] ?></td>
    		<td><?php echo $row['cust_city'] ?></td>
    		<td><?php echo $row['cust_district'] ?></td>
    	<td><?php echo $row['cust_pincode'] ?></td>
            <td><?php echo $row['cust_phone'] ?></td>
    		


    		<?php if ($row['status']=="Active") {
    			?>

            <td><a class="btn btn-success" href="?iid=<?php echo $row['username'] ?>">INACTIVE</a></td>
            

    		<?php 
    		}elseif ($row['status']=="InActive") {
    			?>
    			<td><a class="btn btn-success" href="?aid=<?php echo $row['username'] ?>">ACTIVE</a></td>
    		<?php 
    		} ?>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>