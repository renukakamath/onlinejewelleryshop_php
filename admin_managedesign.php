<?php include 'adminheader.php';


if (isset($_POST['design'])) {
	extract($_POST);
	$q2="select * from tbl_design inner join tbl_category using (cat_id) where design_name='$fname' and cat_id='$categ'";
	$res1=select($q2);
	if(sizeof($res1)>0)
	{
		alert('alredy exist');
	}else{
	
	
    
  $q1="insert into tbl_design values(null,'$categ','$fname','$dis','Active') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_managedesign.php');
 }
}
  if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_design inner join tbl_category using (cat_id) where design_id='$uid'";
 	$res1=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_design set cat_id='$categ',design_name='$fname',description='$dis' where design_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_managedesign.php');

 }

 if (isset($_GET['iid'])) {
	extract($_GET);

	$q="update tbl_design set status='InActive' where design_id='$iid'";
	update($q);


}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_design set status='Active' where design_id='$aid'";
	update($q);
}




 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 700px">
    <div class="hero-container">
<center>
<h1>ADD DESIGN</h1>
<form method="post">
	<?php   if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
			<tr>
			<th> Category</th>
			<td><select name="categ" class="form-control">
				<option value="<?php echo $res1[0]['cat_id'] ?>"><?php echo $res1[0]['cat_name'] ?></option>

				<option>Select Category</option>
				<?php 

				$q="select * from tbl_category where status='Active'";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res1[0]['design_name'] ?>" name="fname"></td>
		</tr>
		
		
		<tr>
			<th>Description</th>
			<td><textarea name="dis" required="" class="form-control"><?php echo $res1[0]['description'] ?></textarea></td>
		</tr>
		
		
		<td align="center" colspan="2"><input type="submit" name="update" value="UPDATE" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
			<tr>
			<th> Category</th>
			<td><select name="categ" class="form-control">
				

				<option>Select Category</option>
				<?php 

				$q="select * from tbl_category where status='Active'";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" name="fname" placeholder="Design Name"></td>
		</tr>
		
		
		<tr>
			<th>Description</th>
			<td><textarea name="dis" required="" class="form-control" placeholder="Description"></textarea></td>
		</tr>
		<td align="center" colspan="2"><input type="submit" name="design" value="SUBMIT" class="btn btn-success"></td>
	</table>
<?php } ?>
</form>
</center>
</div></section>
<center>
	<h1>VIEW DESIGN</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>SNo</th>
				
				<th>Category</th>
				<th>Design</th>
				<th>Description</th>
				
				
			</tr>
			<?php 

     $q="select *,concat (tbl_design.status) as statu ,concat(tbl_design.description) as dis from tbl_design inner join tbl_category using (cat_id)";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		
    		<td><?php echo $row['cat_name'] ?></td>
    		<td><?php echo $row['design_name'] ?></td>
    		<td><?php echo $row['dis'] ?></td>
    	
    		<?php
    		
    	  if ($row['statu']=="Active") {
    	  ?>
              <td><a class="btn btn-success" href="?iid=<?php echo $row['design_id'] ?>">INACTIVE
			</a></td>
            
             <?php 
         }elseif ($row['statu']=="InActive") {
         	?>
             	<td><a class="btn btn-success" href="?aid=<?php echo $row['design_id'] ?>">ACTIVE</a></td>
             <?php
              }?>
      <td><a class="btn btn-success" href="?uid=<?php echo $row['design_id'] ?>">UPDATE</a></td>
             
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>					