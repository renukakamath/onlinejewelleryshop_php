<?php include 'adminheader.php';


if (isset($_POST['product'])) {
	extract($_POST);

	
	$q2="select * from tbl_item  inner join tbl_design using (design_id) where item_name='$fname' and design_id='$design'";
	$res1=select($q2);
	if(sizeof($res1)>0)
	{
		alert('already exist');
	}else{

	
	
    

$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{


		 	
   $q1="insert into tbl_item values(null,'$cid','$design','$fname','0','$dis','$target','Available','$gram') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_manageproduct.php');
 
		}
  
		else
		{
			echo "file uploading error occured";
		}

	


}
}
if (isset($_GET['nid'])) {
	extract($_GET);
	

	$q="update tbl_item set item_status='Not Available' where item_id='$nid'";
	update($q);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_item set item_status='Available' where item_id='$aid'";
	update($q);
}

if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_item  inner join tbl_design using (design_id)  where item_id='$uid'";
 	$res1=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		

 	echo$q="update tbl_item set design_id='$design',item_name='$fname',item_description='$dis',item_image='$target',gram='$gram' where item_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_manageproduct.php');

 }
  else
		{
			echo "file uploading error occured";
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

</script> 
   <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 700px">
    <div class="hero-container">
<center>
<h1>ADD PRODUCT</h1>
<form method="post" enctype="multipart/form-data">
	<?php if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
	

		<tr>
			<th>Design</th>
			<td><select name="design" class="form-control">
				<option value="<?php echo $res1[0]['design_id'] ?>"><?php echo $res1[0]['design_name'] ?></option>

				<option>Select Design</option>
				<?php 

				$q="select * from tbl_design inner join tbl_category using(cat_id) where tbl_design.status='Active'";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['design_id'] ?>"><?php echo $row['design_name'] ?>&<?php echo $row['cat_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res1[0]['item_name'] ?>" name="fname" placeholder="Product Name"></td>
		</tr>
		<tr>
			<th>Weight(g)</th>
			<td><input type="number" required="" name="gram" placeholder="Weight in grams" class="form-control" value="<?php echo $res1[0]['gram']?>"></td>
		</tr>
		
		
		<tr>
			<th>Item Image</th>
			<td><input type="file" required="" class="form-control" placeholder="Stock" value="<?php echo $res1[0]['item_image'] ?>" name="imgg"></td>
		</tr>
		<tr>
			<th>Description</th>
			<td><textarea name="dis" required="" placeholder="Description" class="form-control"><?php echo $res1[0]['item_description'] ?></textarea></td>
		</tr>

		

		<td align="center" colspan="2"><input type="submit" name="update" value="UPDATE" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
	

		<tr>
			<th>Design</th>
			<td><select name="design" class="form-control">
				

				<option>Select Design</option>
				<?php 

				$q="select * from tbl_design inner join tbl_category using(cat_id) where tbl_design.status='Active'";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['design_id'] ?>"><?php echo $row['design_name'] ?> & <?php echo $row['cat_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" name="fname" placeholder="Product Name"></td>
		</tr>
		<tr>
			<th>Weight(g)</th>
			<td><input type="number" required="" name="gram" class="form-control" placeholder="Weight in grams" ></td>
		</tr>
		
		
		<tr>
			<th>Item Image</th>
			<td><input type="file" required="" class="form-control" name="imgg"></td>
		</tr>
		<tr>
			<th>Description</th>
			<td><textarea name="dis" required="" class="form-control" placeholder="Description"></textarea></td>
		</tr>
		
		

		<td align="center" colspan="2"><input type="submit" name="product" value="SUBMIT" class="btn btn-success"></td>
	</table>
<?php } ?>
</form>
</center>
</div></section>
<center>
	<h1>VIEW PRODUCT</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>SNo</th>
				<th>Design</th>
				<th>Name</th>
				<th>Description</th>
				<th>Item Image</th>
				<th>Weight(g)</th>
				<th>Stock</th>	
				
			</tr>
			<?php 

     $q="select * from tbl_item inner join tbl_design using (design_id) where staff_id='$cid' ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['design_name'] ?></td>
    		<td><?php echo $row['item_name'] ?></td>
    		<td><?php echo $row['item_description'] ?></td>
    		<td><img src="<?php echo $row['item_image'] ?>" height="100" width="100"></td>
    	     <td><?php echo $row['gram'] ?></td>
    		<td><?php echo $row['stock'] ?></td>
			
    		
    		<?php 

              if ($row['item_status']=="Available") {?>
              
              	<td><a class="btn btn-success" href="?nid=<?php echo $row['item_id'] ?>">INACTIVE</a></td>
         <?php }elseif ($row['item_status']=="Not Available") {?>
         	<td><a class="btn btn-success" href="?aid=<?php echo $row['item_id'] ?>"> ACTIVE</a></td>
        <?php }
    		 ?>
    		 	<td><a class="btn btn-success" href="?uid=<?php echo $row['item_id'] ?>">UPDATE</a></td>
    		
    		
    	</tr>
    <?php }

			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>