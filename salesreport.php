<?php include 'adminheader.php';
 
extract($_GET);



 ?>
<!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
<center>
  <h1>SEARCH SALES</h1>
  <form method="post">
    <table style="color: black;width: 100px">

  
       <td style="color: white"><input type="date" name="daily" > DAILY </td>
        <td  style="color: white"> <input type="month" name="monthly"> MONTHLY </td>
        <td  style="color: white"> <input type="text" name="customer" placeholder="Search by Customer"> CUSTOMER </td>

     <tr>
       <td align="center" colspan="5"><input type="submit" name="sale" class="btn btn-success" value="SEARCH"></td>
      </tr>
    

      </tr>
    </table>
  </form>
</center>


    </div>
  </section><!-- End Hero -->




<center>
  <h1>VIEW SALES</h1>
  <form>
  <table class="table" style="width: 500px;color: black">
    <tr>
      <th>SNo</th>
                <th>Customer</th>
         <th>Date</th>
         <th>Product</th>
         <th>Grams</th>
        <th>Quantity</th>
       
                
        <th>Total Amount</th>
        
           
    </tr>

  <h2><a class="btn btn-success" href="sales.php">PRINT</a></h2>
  
    <?php 
         if (isset($_POST['sale'])) {
           extract($_POST);
           // echo $monthly;
           if ($daily!="") {
             // "hi";
           $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_item` USING (item_id)  INNER JOIN tbl_customer USING (cust_id)  where o_date='$daily' and tbl_cartmaster.status='paid' ";
           }
            else if ($monthly!="") {

            
             $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_item` USING (item_id)  INNER JOIN tbl_customer USING (cust_id)  where o_date like '$monthly%' and tbl_cartmaster.status='paid' ";

             }
           

           else if ($customer!="") {

            
            $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_item` USING (item_id)  INNER JOIN tbl_customer USING (cust_id)  where cust_fname like '$customer%' and tbl_cartmaster.status='paid' ";

            }
          }
             else{
            $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_item` USING (item_id)  INNER JOIN tbl_customer USING (cust_id) where tbl_cartmaster.status='paid' ";
            }

                $res=select($q);
                $_SESSION['res']=$res;
                $r=$_SESSION['res'];

       $slno=1;
       foreach ($res as $row) {
        ?>
    <tr>
       <td><?php echo $slno++; ?></td>
            <td><?php echo $row['cust_fname'] ?></td>
        <td><?php echo $row['o_date'] ?></td>
        <td><?php echo $row['item_name'] ?></td>
        <td><?php echo $row['gram'] ?></td>
        <td><?php echo $row['qty'] ?></td>
    
      
        <td><?php echo $row['total_amount'] ?></td>
        
       
        
    </tr>
  
     <?php
       }


     ?>
  </table>
  </form>
</center>
<?php include 'footer.php' ?>