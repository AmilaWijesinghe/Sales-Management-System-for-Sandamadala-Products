<?php
session_start();
if(isset($_SESSION['name'])){
  try{

  include 'db_connection.php';
  
    $product_1 = "50g";
		$product_2 = "100g";
		$product_3 = "150g";
    $updated_status="Completed";
    if($_SERVER["REQUEST_METHOD"] === "POST"){

      $order_id = $_POST["order_id"];

      $sql1 = "UPDATE order_header SET status ='$updated_status' WHERE order_id=$order_id";
      $result=mysqli_query($conn,$sql1);

    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Online Orders</title>
</head>
<body>



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
            <a href="http://localhost/Sandamadala%20Products/salesmanDashboard/" class="active" data-active="0">
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
          <a href="http://localhost/sandamadala%20Products/onlineSales/" data-active="1">
            <div class="icon">
              <i class='bx bx-folder'></i>
              <i class='bx bxs-folder'></i>
            </div>
            <span class="link hide" onclick="run(this)">Online Orders</span>
          </a>
        </li>
        </ul>

        <ul>
			<li class="tooltip-element" data-tooltip="1">
          <a href="http://localhost/Sandamadala%20Products/salesmanUpdateSales/" data-active="1">
            <div class="icon">
              <i class='bx bx-folder'></i>
              <i class='bx bxs-folder'></i>
            </div>
            <span class="link hide" onclick="run(this)">Update Sales</span>
          </a>
        </li>
        </ul>
  
  
        <h4 class="hide">More</h4>
  
        <ul>
          <li class="tooltip-element" data-tooltip="1">
            <a href="#" data-active="5">
              <div class="icon">
                <i class='bx bx-help-circle'></i>
                <i class='bx bxs-help-circle'></i>
              </div>
              <span class="link hide" onclick="run(this)">Help</span>
            </a>
          </li>
          <li class="tooltip-element" data-tooltip="2">
            <a href="#" data-active="6">
              <div class="icon">
                <i class='bx bx-cog'></i>
                <i class='bx bxs-cog'></i>
              </div>
              <span class="link hide" onclick="run(this)">Settings</span>
            </a>
          </li>
  
          <div class="tooltip">
            <span class="show">Help</span>
            <span>Settings</span>
          </div>
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
              <h3><?php echo $_SESSION['name']; ?></h3>
              <h5>Manager</h5>
            </div>
          </div>
          <a href="http://localhost/Sandamadala%20Products/index.php" class="log-out">
            <i class='bx bx-log-out'></i>
          </a>
        </div>
        <div class="tooltip">
          <span class="show">Udara</span>
          <span>Logout</span>
        </div>
      </div>
      </nav>

	<section id="content">
		

		<!-- MAIN -->
		<main>
    <form method="POST">
			<div class="head-title">
				<div class="left">
					<h1>Online Orders</h1>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<table>
				<tbody>
				  <tr>
					<td>
					  <div class="input-box">
						<span class="details">Order Id:</span>
						<select name="order_id" required>
						  <option value="">Select order id</option>
              <?php
                $sql = "SELECT DISTINCT order_id FROM order_header";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["order_id"] . "'>" . $row["order_id"] . "</option>";
                  }
                } else {
                  echo "0 results";
                }
                ?>
						</select>
            </div>
					</td> 
            
					<td>
					  <div class="button">
						<input type="submit" value="Sort">
						</div>
					</td>
				  </tr>
				</tbody>
			  </table>
        
	  

			<div class="table-data">
				<div class="order">
					<div class="head">
						
            <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
                        
                   $order_id = $_POST["order_id"];
								?>

            <h3>Order Id: <?php echo $order_id ?></h3>
            <?php
                   }
            ?>

						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
          
					<table>
						<thead>
							<tr>
								<th></th>
								<th> Value</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>
									<h4>Number of packets 50g</h4>
								</td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
                        
                   $order_id = $_POST["order_id"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM order_details WHERE order_id=$order_id and product ='$product_1'"); 
                   while($row = mysqli_fetch_assoc($result)){               
                    $no_of_50g=$row["qty"];
								?>

								<td><p><?php echo $row["qty"] ?></p></td>
                <?php	
                      }
                    }
								?>

							</tr>

              <tr>
								<td>
									<h4>Number of packets 100g</h4>
								</td>
								
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
                        
                   $order_id = $_POST["order_id"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM order_details WHERE order_id=$order_id and product ='$product_2'"); 
                   while($row = mysqli_fetch_assoc($result)){               
                    $no_of_100g=$row["qty"];
								?>

								<td><p><?php echo $row["qty"] ?></p></td>
                <?php	
                      }
                    }
								?>
               
							</tr>
              
              <tr>
								<td>
									<h4>Number of packets 150g</h4>
								</td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
                        
                   $order_id = $_POST["order_id"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM order_details WHERE order_id=$order_id and product ='$product_3'"); 
                   while($row = mysqli_fetch_assoc($result)){               
                    $no_of_150g=$row["qty"];
								?>

								<td><p><?php echo $row["qty"] ?></p></td>
                <?php	
                      }
                    }
								?>
							</tr>

              <tr>
								<td>
									<h4>Amount for 50g packets</h4>
								</td>
								<?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
                        
                   $order_id = $_POST["order_id"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM order_details WHERE order_id=$order_id and product ='$product_1'"); 
                   while($row = mysqli_fetch_assoc($result)){               
                    $amount_50g=$row["amount"];
								?>

								<td><p><?php echo $row["amount"] ?></p></td>
                <?php	
                      }
                    }
								?>
							</tr>

              <tr>
								<td>
									<h4>Amount for 100g packets</h4>
								</td>
								<?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
                        
                   $order_id = $_POST["order_id"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM order_details WHERE order_id=$order_id and product ='$product_2'"); 
                   while($row = mysqli_fetch_assoc($result)){               
                    $amount_100g=$row["amount"];
								?>

								<td><p><?php echo $row["amount"] ?></p></td>
                <?php	
                      }
                    }
								?>
							</tr>

              <tr>
								<td>
									<h4>Amount for 150g packets</h4>
								</td>
								<?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
                        
                   $order_id = $_POST["order_id"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM order_details WHERE order_id=$order_id and product ='$product_3'"); 
                   while($row = mysqli_fetch_assoc($result)){               
                    $amount_150g=$row["amount"];
								?>

								<td><p><?php echo $row["amount"] ?></p></td>
                <?php	
                      }
                    }
								?>
							</tr>

              <tr>
								<td>
									<h4>Total amount for order</h4>
								</td>
								<?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
                        
                   $order_id = $_POST["order_id"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM order_header WHERE order_id=$order_id"); 
                   while($row = mysqli_fetch_assoc($result)){               
                    $amount=$row["amount"];
								?>

								<td><p><?php echo $row["amount"] ?></p></td>
                <?php	
                      }
                    }
								?>
							</tr>
						</tbody>
					</table>
          
			</div>
      
      </form>
      
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>
<?php
    }catch(Exception $e){
      ?>
      <script>
        alert('Invalid Input');
        window.location.href = "http://localhost/sandamadala%20Products/onlineSales/"
        </script>
        <?php
    }
	}else{
		header("location: http://localhost/Sandamadala%20Products/index.php ");
	}
?>