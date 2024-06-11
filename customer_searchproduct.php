<?php include 'customerheader.php' ?>
   <!-- ======= Hero Section ======= -->
  <section id="hero" style="height: 500px">
    <div class="hero-container">
<center>
  <h1>Fliter Product</h1>
  <form method="post">
  <table class="table" style="width: 500px;color: white">
    <tr>
      <th>Search</th>
      <td><input type="text"  class="form-control" required="" name="filter"></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" class="btn btn-success" name="search"></td>
    </tr>
  </table>
  </form>
</center>
</div></section>

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
         
          <h3>view <span>Product </span></h3>
         
        </div>
        <div class="row">

   <?php 


      if (isset($_POST['search'])) {
        extract($_POST);
         $q="SELECT * FROM tbl_item INNER JOIN tbl_design USING (design_id) INNER JOIN tbl_category USING (cat_id)  where (cat_name like '%$filter%' or design_name like '%$filter%' or item_name like '%$filter%')  and (item_status='Available') ";
      

      }else{

     $q="SELECT * FROM tbl_item INNER JOIN tbl_design USING (design_id) INNER JOIN tbl_category USING (cat_id)    WHERE item_status='Available'";}
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
        

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="<?php echo $row['item_image'] ?>" height="400" width="400"  class="img-fluid" alt="">
                <div class="social">
                
                
                </div>
              </div>
              <div class="member-info">
                <h4>Item Name:<?php echo $row['item_name'] ?></h4>
               <h4>Design:<?php echo $row['design_name'] ?></h4>
             <h4>Gram:<?php echo $row['gram'] ?></h4>

                  <h4>Category: <?php echo $row['cat_name'] ?></h4>
               
                <span>Description: <?php echo $row['item_description'] ?></span>
      <?php 

             if ($row['stock']>0) {?>
              <a class="btn btn-success" href="customer_addtocart.php?iid=<?php echo $row['item_id'] ?>&stock=<?php echo $row['stock'] ?>&gram=<?php echo $row['gram']?>">Cart</a>

            <?php  }elseif ($row['stock']<=0) {?>

             <a class="btn btn-success" href="#">Out  Of  Stock</a>
           <?php   }

         ?>
    
              </div>
            </div>
          </div>
        



    <?php }

       ?>
       </div>
      </div>
    </section>


<?php include 'footer.php' ?>