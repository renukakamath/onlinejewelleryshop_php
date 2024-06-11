<?php include 'adminheader.php';


if (isset($_POST['category'])) {
	extract($_POST);
	$q2="select * from tbl_category where cat_name='$fname'";
	$res1=select($q2);
	if(sizeof($res1)>0)
	{
		alert('alredy exist');
	}else{
	
    
  $q1="insert into tbl_category values(null,'$fname','$dis','Active') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_managecategory.php');
 }
}
  if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_category where cat_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_category set cat_name='$fname' ,cat_description='$dis' where cat_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_managecategory.php');

 }
 if (isset($_GET['iid'])) {
	extract($_GET);

	$q="update tbl_category set status='InActive' where cat_id='$iid'";
	update($q);


}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_category set status='Active' where cat_id='$aid'";
	update($q);
}



 ?>

 <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 700px">
    <div class="hero-container">
<center>
<h1>ADD CATEGORY</h1>
<form method="post">
	<?php   if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['cat_name'] ?>" name="fname" placeholder="Category Name"></td>
		</tr>
		
		
		<tr>
			<th>Description</th>
			<td><textarea name="dis" required="" class="form-control" placeholder="Description"><?php echo $res[0]['cat_description'] ?></textarea></td>
		</tr>
		
		
		<td align="center" colspan="2"><input type="submit" name="update" value="UPDATE" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" name="fname" placeholder="Category Name"></td>
		</tr>
		
		
		<tr>
			<th>Description</th>
			<td><textarea name="dis" required="" class="form-control" placeholder="Description"></textarea></td>
		</tr>
		
		
		<td align="center" colspan="2"><input type="submit" name="category" value="SUBMIT" class="btn btn-success"></td>
	</table>
<?php } ?>
</form>
</center>
</div></section>
<center>
	<h1>VIEW CATEGORY</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>SNo</th>
				<th>Category</th>
				<th>Description</th>
				
				
			</tr>
			<?php 

     $q="select * from tbl_category";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {
    	?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['cat_name'] ?></td>
    		<td><?php echo $row['cat_description'] ?></td>
         <?php

    	  if ($row['status']=="Active") {
    	  ?>
              <td><a class="btn btn-success" href="?iid=<?php echo $row['cat_id'] ?>">INACTIVE</a></td>
            
             <?php 
         }elseif ($row['status']=="InActive") {
         	?>
             	<td><a class="btn btn-success" href="?aid=<?php echo $row['cat_id'] ?>">ACTIVE</a></td>
             <?php
              }?>
      <td><a class="btn btn-success" href="?uid=<?php echo $row['cat_id'] ?>">UPDATE</a></td>
             
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>
