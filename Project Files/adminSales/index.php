
<?php
session_start();
if(isset($_SESSION['name'])){
  try{

  include 'db_connection.php';

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Salesman Dashboard</title>
<!DOCTYPE html>
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
        <div class="active-tab"></div>
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

	
	<section id="content">
	
		<!-- MAIN -->
		<main>
		<form method="POST">
			<div class="head-title">
				<div class="left">
					<h1>Sales</h1>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>
			<!--Order table statrts here-->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<div class="input-box">
							<select name="date" id="date">
								<option value="">Select Date</option>
								<?php
								$sql = "SELECT DISTINCT date FROM sales_header";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo "<option value='" . $row["date"] . "'>" . $row["date"] . "</option>";
								}
								} else {
								echo "0 results";
								}
								?>
							</select>
							<div class="button">
								<input type="submit" value="Sort">
							</div>
						</div>
					</div>
					
					<table>
						<thead>
							<tr>
								<th>Sales ID</th>
								<th>Date</th>
								<th>Invoice Number</th>
								<th>Salesman Name</th>
								<th>Customer</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
						<?php

							if($_SERVER["REQUEST_METHOD"] === "POST"){

								$date=$_POST['date'];

							$sql="SELECT * FROM sales_header where date='$date'";
							$result = mysqli_query($conn, $sql);

							if($result-> num_rows >0){
							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr><td>".$row['sales_id']."</td><td>".$row['date']."</td><td>".$row['invoice_no']."</td><td>".$row['salesman_name']."</td><td>".$row['customer']."</td><td>"
								.$row['amount']."</td></tr>";
							}
							echo "</table>";
							} else{
							echo "0 result";
							}
							}
							?>
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
        window.location.href = "http://localhost/sandamadala%20Products/onlineSales/"
        </script>
        <?php
    }
	}else{
		header("location: http://localhost/Sandamadala%20Products/index.php ");
	}
?>