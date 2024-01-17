<?php
session_start();
  include 'db_connection.php';
  if(isset($_SESSION['name'])){
	try{

    $product_1 = "50g";
		$product_2 = "100g";
		$product_3 = "150g";
	
		$result = mysqli_query($conn, "SELECT * FROM production ORDER BY production_id DESC LIMIT 1" );
			  while($row = mysqli_fetch_assoc($result)){
	
		  $batch_no = $row['batch_no'];
	  
			}

   $sql = "SELECT DISTINCT batch_no FROM production";
                $result = $conn->query($sql);

  
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

	<title>Report</title>
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
          
        <div class="active-tab"></div>
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

	<section id="content">
		

		<!-- MAIN -->
		<main>
    <form method="POST">
			<div class="head-title">
				<div class="left">
					<h1>Report</h1>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>
      
					  
 <!------------------------------------------------------------------------------------------------------------------------------------------------->          
            <table>
						<thead>
							<tr>
								<th>
                <div class="input-box">
						  <span class="details">Batch Number:</span>
						  <select name="batch" required>
						    <option value="">Select batch number</option>
                  <?php
                    $sql = "SELECT DISTINCT batch_no FROM batches";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row["batch_no"] . "'>" . $row["batch_no"] . "</option>";
                    }
                    } else {
                      echo "0 results";
                    }
                  ?>
						  </select>
            </div>
                </th>
								<th>
                  <div class="button">
						        <input type="submit" value="Sort">
						      </div>
                </th>
							</tr>
						</thead>
	</table>
  <!----------------------------------------------------------------------------------------------------------------------------------------------->
			<div class="table-data">
				<div class="order">
					<div class="head">
						
            <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
                        
                   $batch_number = $_POST["batch"];
								?>

            <h3>Batch Number: <?php echo $batch_number ?></h3>
            <?php
                   }
            ?>
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
									<h4>Number of Units</h4>
								</td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM batches WHERE batch_no=$batch_number"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>

								<td><p><?php echo $row["no_of_units"] ?></p></td>
                <?php	
                      }
                    }
								?>


							</tr>

              <tr>
								<td>
									<h4>Cost for raw materials(per Unit)</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM batches WHERE batch_no=$batch_number"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["raw_cost_per_unit"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>
              
              <tr>
								<td>
									<h4>Usefull Units</h4>
								</td>
                <td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM batches WHERE batch_no=$batch_number"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                <p><?php echo $row["useful_units"] ?></p>
                <?php	
                      }
                    }
								?>
                </td>
							</tr>

              <tr>
								<td>
									<h4>Number of packets 50g</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM production WHERE batch_no=$batch_number and product='$product_1'"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p><?php echo $row["qty"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Number of packets 100g</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM production WHERE batch_no=$batch_number and product='$product_2'"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p><?php echo $row["qty"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Number of packets 150g</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM production WHERE batch_no=$batch_number and product='$product_3'"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p><?php echo $row["qty"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Total Cost for 50g packet</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM product WHERE batch_no=$batch_number and product='$product_1'"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["cost"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Total Cost for 100g packet</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM product WHERE batch_no=$batch_number and product='$product_2'"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["cost"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Total Cost for 150g packet</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM product WHERE batch_no=$batch_number and product='$product_3'"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["cost"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>


						</tbody>
					</table>

				</div>
				
				<div class="order">
					<div class="head">
					</div>

					<table>
						<thead>
							<tr>
								<th></th>
								<th>Value</th>
							</tr>
						</thead>

						<tbody>

              <tr>
								<td>
									<h4>Cost for wastage</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM batches WHERE batch_no=$batch_number"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["wastage_cost"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Cost for transport</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM batches WHERE batch_no=$batch_number"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["transport_cost"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Cost for depreciation</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM batches WHERE batch_no=$batch_number"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["depreciation_cost"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Cost for cerosene</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM batches WHERE batch_no=$batch_number"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["cerosene_cost"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Cost for labor</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM batches WHERE batch_no=$batch_number"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["labor_cost"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Cost for polytene</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM batches WHERE batch_no=$batch_number"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["polythene_cost"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Cost for sticker</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM batches WHERE batch_no=$batch_number"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["sticker_cost"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Cost for electricity</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM batches WHERE batch_no=$batch_number"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["electricity_cost"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

              <tr>
								<td>
									<h4>Total cost</h4>
								</td>
								<td>
                <?php
                   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
                    //Manager updated prices
                        
                   $batch_number = $_POST["batch"];
                        
                   $result = mysqli_query($conn,"SELECT * FROM batches WHERE batch_no=$batch_number"); 
                   while($row = mysqli_fetch_assoc($result)){               
          
								?>
                  <p>Rs. <?php echo $row["tot_cost"] ?></p>
                  <?php	
                      }
                    }
								?>
               </td>
							</tr>

						</tbody>

					</table>

				</div>
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
	  window.location.href = "http://localhost/Sandamadala%20Products/index.php"
	  </script>
	  <?php
  }

  } else{
  header("location: http://localhost/Sandamadala%20Products/index.php ");
  }
?>