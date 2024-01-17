<?php 
  session_start();

  if(isset($_SESSION['name'])){

    try{
    $mysqli = require __DIR__ ."/db_connection.php";
    $is_invalid = false;

    $product_1 = "50g";
    $product_2 = "100g";
    $product_3 = "150g";

    $result = mysqli_query($conn, "SELECT * FROM batches ORDER BY batch_no DESC LIMIT 1" );
		  while($row = mysqli_fetch_assoc($result)){

      $batch_no = $row['batch_no'];
  
		}
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
  
      //Manager updated prices
      

      $new_sale_price_50g = $_POST["new_sale_price_50g"];
      $new_sale_price_100g = $_POST["new_sale_price_100g"];
      $new_sale_price_150g = $_POST["new_sale_price_150g"];

      $new_retail_price_50g = $_POST["new_retail_price_50g"];
      $new_retail_price_100g = $_POST["new_retail_price_100g"];
      $new_retail_price_150g = $_POST["new_retail_price_150g"];


      $sql = "UPDATE price SET updated_wholesale_price='$new_sale_price_50g', updated_retail_price='$new_retail_price_50g' WHERE batch_no=$batch_no and product='$product_1'";

      $result = mysqli_query($conn,$sql);

      $sql1 = "UPDATE price SET updated_wholesale_price='$new_sale_price_100g', updated_retail_price='$new_retail_price_100g' WHERE batch_no=$batch_no and product='$product_2'";

      $result1 = mysqli_query($conn,$sql1);

      $sql2 = "UPDATE price SET updated_wholesale_price='$new_sale_price_150g', updated_retail_price='$new_retail_price_150g' WHERE batch_no=$batch_no and product='$product_3'";

      $result2 = mysqli_query($conn,$sql2);

      $is_invalid = true;

    
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">

    <title> Update </title>

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
              				<a href="http://localhost/Sandamadala%20Products/dashboard/" class="active" data-active="0">
                				<div class="icon">
                  					<i class='bx bx-tachometer'></i>
                  					<i class='bx bxs-tachometer'></i>
                				</div>
                				<span class="link hide" onclick="run(this)">Dashboard</span>
              				</a>
            			</li>
				</ul>

				<ul>
            		<li class="tooltip-element" data-tooltip="2">
              			<a href="http://localhost/Sandamadala%20Products/addUser/" data-active="2">
               				<div class="icon">
                  				<i class='bx bx-message-square-detail'></i>
                  				<i class='bx bxs-message-square-detail'></i>
                			</div>
                			<span class="link hide" onclick="run(this)">Add User</span>
              			</a>
            		</li>
				</ul>

				<ul>
					<li class="tooltip-element" data-tooltip="1">
          				<a href="http://localhost/Sandamadala%20Products/enterDetails/index.php" data-active="1">
            				<div class="icon">
              					<i class='bx bx-folder'></i>
              					<i class='bx bxs-folder'></i>
            				</div>
            				<span class="link hide" onclick="run(this)">Enter Details</span>
          				</a>
        			</li>
				</ul>

				<ul>
        <div class="active-tab"></div>
          			<li class="tooltip-element" data-tooltip="3">
            			<a href="http://localhost/Sandamadala%20Products/update/index.php" data-active="3">
              				<div class="icon">
                				<i class='bx bx-bar-chart-square'></i>
                				<i class='bx bxs-bar-chart-square'></i>
              				</div>
              				<span class="link hide" onclick="run(this)">Update</span>
            			</a>
          			</li>
        		</ul>

				<ul>
          			<li class="tooltip-element" data-tooltip="3">
            			<a href="http://localhost/Sandamadala%20Products/adminSales/index.php" data-active="3">
              				<div class="icon">
                				<i class='bx bx-bar-chart-square'></i>
                				<i class='bx bxs-bar-chart-square'></i>
              				</div>
              				<span class="link hide" onclick="run(this)">Sales</span>
            			</a>
          			</li>
        		</ul>

				<ul>
          			<li class="tooltip-element" data-tooltip="3">
            			<a href="http://localhost/Sandamadala%20Products/adminOnlineOrders/index.php" data-active="3">
              				<div class="icon">
                				<i class='bx bx-bar-chart-square'></i>
                				<i class='bx bxs-bar-chart-square'></i>
              				</div>
              				<span class="link hide" onclick="run(this)">Online Orders</span>
            			</a>
          			</li>
        		</ul>

				<ul>
				<li class="tooltip-element" data-tooltip="2">
              <a href="http://localhost/Sandamadala%20Products/report/" data-active="2">
                <div class="icon">
                  <i class='bx bx-message-square-detail'></i>
                  <i class='bx bxs-message-square-detail'></i>
                </div>
                <span class="link hide" onclick="run(this)">Report</span>
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
              					<h5>Manager</h5>
            				</div>
          			</div>
          			<a href="http://localhost/Sandamadala%20Products/" class="log-out">
            			<i class='bx bx-log-out'></i>
         			 </a>
        		</div>
      		</div>
      	</nav>  
<!--side menu bar ends here-->

<!--Form starts here-->
    <div class="container">
      <div class="title">Update Prices</div>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM batches ORDER BY batch_no DESC LIMIT 1" );
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <h3>Batch Number : <?php echo $row["batch_no"] ?></h3>
                <?php	
                }
                ?>
        <div class="content">
          <form method="post">
            <?php if($is_invalid): ?>
            <script>alert ("Successfully updated");</script>
            <?php endif; ?>
      
            <div class="user-details">
              <div class="input-box">
                <span class="details">Sale price 50g :</span>
                <?php
								$result = mysqli_query($conn, "SELECT * FROM price where batch_no = $batch_no and product = '$product_1'" );
								while($row = mysqli_fetch_assoc($result)){
								?>
								<h3>Rs.<?php echo $row["suggested_wholesale_price"] ?></h3>
								<?php	
								  }
								?>
                <input type="text" name="new_sale_price_50g" id="new_sale_price_50g" placeholder="Enter new sale price" required>
              </div>

              <div class="input-box">
                <span class="details">Sale price 100g :</span>
                <?php
								$result = mysqli_query($conn, "SELECT * FROM price where batch_no = $batch_no and product = '$product_2'" );
								while($row = mysqli_fetch_assoc($result)){
								?>
								<h3>Rs.<?php echo $row["suggested_wholesale_price"] ?></h3>
								<?php	
								  }
								?>
                <input type="text" name="new_sale_price_100g" id="new_sale_price_100g" placeholder="Enter new sale price" required>
              </div>

              <div class="input-box">
                <span class="details">Sale price 150g :</span>
                <?php
								$result = mysqli_query($conn, "SELECT * FROM price where batch_no = $batch_no and product = '$product_3'" );
								while($row = mysqli_fetch_assoc($result)){
								?>
								<h3>Rs.<?php echo $row["suggested_wholesale_price"] ?></h3>
								<?php	
								  }
								?>
                <input type="text" name="new_sale_price_150g" id="new_sale_price_150g" placeholder="Enter new sale price" required>
              </div>
        
              <div class="input-box">
                <span class="details">Retail price 50g :</span>
                <?php
								$result = mysqli_query($conn, "SELECT * FROM price where batch_no = $batch_no and product = '$product_1'" );
								while($row = mysqli_fetch_assoc($result)){
								?>
								<h3>Rs.<?php echo $row["suggested_retail_price"] ?></h3>
								<?php	
								  }
								?>
                <input type="text" name="new_retail_price_50g" id="new_retail_price_50g" placeholder="Enter new retail price" required>
              </div>

              <div class="input-box">
                <span class="details">Retail price 100g :</span>
                <?php
								$result = mysqli_query($conn, "SELECT * FROM price where batch_no = $batch_no and product = '$product_2'" );
								while($row = mysqli_fetch_assoc($result)){
								?>
								<h3>Rs.<?php echo $row["suggested_retail_price"] ?></h3>
								<?php	
								  }
								?>
                <input type="text" name="new_retail_price_100g" id="new_retail_price_100g" placeholder="Enter new retail price" required>
              </div>

              <div class="input-box">
                <span class="details">Retail price 150g :</span>
                <?php
								$result = mysqli_query($conn, "SELECT * FROM price where batch_no = $batch_no and product = '$product_3'" );
								while($row = mysqli_fetch_assoc($result)){
								?>
								<h3>Rs.<?php echo $row["suggested_retail_price"] ?></h3>
								<?php	
								  }
								?>
                <input type="text" name="new_retail_price_150g" id="new_retail_price_150g" placeholder="Enter new retail price" required>
              </div>

            </div>

            <div class="button">
              <input type="submit" value="Update">
            </div>
          </form>
        </div>
     </div>

  </body>
</html>

<?php
    }catch(Exception $e){
      ?>
      <script>
        alert('Invalid Input');
        window.location.href = "http://localhost/Sandamadala%20Products/update/index.php"
        </script>
        <?php
    }
  } else{
  header("location: http://localhost/Sandamadala%20Products/index.php ");
  }
?>