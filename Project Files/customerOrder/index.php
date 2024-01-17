<?php
   include 'db_connection.php';
   session_start();
   if(isset($_SESSION['name'])){
    try{

    $product_1 = "50g";
    $product_2 = "100g";
    $product_3 = "150g";
   
   if($_SERVER["REQUEST_METHOD"] === "POST"){
 

     $date = $_POST['order_date'];
     $formatted_date = date("Y-m-d", strtotime($date));
     $customer_name = $_SESSION['name'];
     $address = $_POST['address'];
     $no_50g = $_POST['50g'];
     $no_100g = $_POST['100g'];
     $no_150g = $_POST['150g'];
     $status = "To Complete";
 
     $result = mysqli_query($conn, "SELECT * FROM batches ORDER BY batch_no DESC LIMIT 1" );
     while($row = mysqli_fetch_assoc($result)){
 
           $batch_no = $row["batch_no"];
 
       }

       $result = mysqli_query($conn, "SELECT * FROM price where batch_no = $batch_no and product = '$product_1'" );
       while($row = mysqli_fetch_assoc($result)){
   
         $wholesale_price_50g = $row['updated_wholesale_price'];
     
       }
       $result = mysqli_query($conn, "SELECT * FROM price where batch_no = $batch_no and product = '$product_2'" );
       while($row = mysqli_fetch_assoc($result)){
   
         $wholesale_price_100g = $row['updated_wholesale_price'];
     
       }
       $result = mysqli_query($conn, "SELECT * FROM price where batch_no = $batch_no and product = '$product_3'" );
       while($row = mysqli_fetch_assoc($result)){
   
         $wholesale_price_150g = $row['updated_wholesale_price'];
     
       }

       $amount_50g = $no_50g*$wholesale_price_50g;
       $amount_100g = $no_100g*$wholesale_price_100g;
       $amount_150g = $no_150g*$wholesale_price_150g;

       $amount = $amount_50g+$amount_100g+$amount_150g;

       $query="INSERT INTO order_header(date,customer_name,address,amount,status) VALUES('.$formatted_date.','".$customer_name."','".$address."',".$amount.",'".$status."')";
       $result=mysqli_query($conn,$query);

       $result = mysqli_query($conn, "SELECT * FROM order_header ORDER BY order_id DESC LIMIT 1" );
       while($row = mysqli_fetch_assoc($result)){
   
         $order_id = $row['order_id'];
     
       }

       $query="INSERT INTO order_details(order_id,product,qty,amount) VALUES(".$order_id.",'".$product_1."',".$no_50g.",".$amount_50g.")";
       $result=mysqli_query($conn,$query);

       $query="INSERT INTO order_details(order_id,product,qty,amount) VALUES(".$order_id.",'".$product_2."',".$no_100g.",".$amount_100g.")";
       $result=mysqli_query($conn,$query);

       $query="INSERT INTO order_details(order_id,product,qty,amount) VALUES(".$order_id.",'".$product_3."',".$no_150g.",".$amount_150g.")";
       $result=mysqli_query($conn,$query);
       ?>
       <script>alert('Your order added successfully');</script>
      <?php
   }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Customer Order </title>
    
    <link rel="stylesheet" href="style.css">

  </head>

  <body>
    <!--side menu bar starts here-->
    <nav>
      <div class="sidebar-top">
        <img src="../images/logo.png" class="logo" alt="">
        <h3 class="hide">Sandamadala Products</h3>
      </div>
  
      <div class="search">
        <i class='bx bx-search'></i>
        <input type="text" class="hide" placeholder="Quick Search ...">
      </div>
  
      <div class="sidebar-links">
        <ul>
          <li class="tooltip-element" data-tooltip="0">
            <a href="http://localhost/Sandamadala%20Products/customerDashboard/" class="active" data-active="0">
              <div class="icon">
                <i class='bx bx-tachometer'></i>
                <i class='bx bxs-tachometer'></i>
              </div>
              <span class="link hide" onclick="run(this)">Dashboard</span>
            </a>
          </li>
        </ul>

        <ul>
          <div class="active-tab"></div>
			      <li class="tooltip-element" data-tooltip="1">
              <a href="#" data-active="1">
                <div class="icon">
                  <i class='bx bx-folder'></i>
                  <i class='bx bxs-folder'></i>
                </div>
                <span class="link hide" onclick="run(this)">Order</span>
             </a>
            </li>
        </ul>

  
        <h4 class="hide">More</h4>
  
        <ul>
          <li class="tooltip-element" data-tooltip="0">
            <a href="#" data-active="4">
              <div class="icon">
                <i class='bx bx-help-circle'></i>
                <i class='bx bxs-help-circle'></i>
              </div>
              <span class="link hide" onclick="run(this)">Help</span>
            </a>
          </li>

          <li class="tooltip-element" data-tooltip="1">
            <a href="#" data-active="5">
              <div class="icon">
                <i class='bx bx-cog'></i>
                <i class='bx bxs-cog'></i>
              </div>
              <span class="link hide" onclick="run(this)">Settings</span>
            </a>
          </li>
        </ul>
      </div>
  
      <div class="sidebar-footer">
        <a href="#" class="account tooltip-element" data-tooltip="0">
          <i class='bx bx-user'></i>
        </a>
        <div class="admin-user tooltip-element" data-tooltip="1">
          <div class="admin-profile hide">
            <img src="../images/login.png" alt="">
            <div class="admin-info">	
              <h3>
				        <?php
				          echo $_SESSION['name'];
				        ?>
			        </h3>
              <h5>Customer</h5>
            </div>
          </div>

          <a href="http://localhost/Sandamadala%20Products/index.php" class="log-out">
            <i class='bx bx-log-out'></i>
          </a>
        </div>
      </div>
    </nav>  
    <!--side menu bar ends here-->

    <!--Input Form starts here-->
    <div class="container">
    
      <div class="title">Order</div>
    
      <div class="content">
      
        <form  method="POST">
          <div class="user-details">

            <div class="input-box">
              <span class="details">Date:</span>
              <input type="date" name="order_date"  required>
            </div>

            <div class="input-box">
              <span class="details">Address:</span>
              <input type="text" name="address" placeholder="Enter shop address" required>
            </div>

            <div class="input-box">
              <span class="details">No of 50g:</span>
              <input type="text" name="50g" placeholder="Enter number of packets" required>
            </div>

            <div class="input-box">
              <span class="details">No of 100g:</span>
              <input type="text" name="100g" placeholder="Enter number of packets" required>
            </div>

            <div class="input-box">
              <span class="details">No of 150g:</span>
              <input type="text" name="150g" placeholder="Enter number of packets" required>
            </div>
          </div>

          <div class="button">
            <input type="submit" value="Order">
          </div>
        </form>
        <!--Input Form ends here-->
      </div>
    </div>

  </body>
</html>
<?php
}catch(Exception $e){
  ?>
  <script>
    alert('Invalid Input');
    window.location.href = "http://localhost/Sandamadala%20Products/customerOrder/"
    </script>
    <?php
}

	}else{
		header("location: http://localhost/Sandamadala%20Products/index.php ");
	}
?>
