<?php
	session_start();
	include 'db_connection.php';
	if(isset($_SESSION['name'])){

		$product_1 = "50g";
		$product_2 = "100g";
		$product_3 = "150g";
	
		$result = mysqli_query($conn, "SELECT * FROM batches ORDER BY batch_no DESC LIMIT 1" );
			  while($row = mysqli_fetch_assoc($result)){
	
		  $batch_no = $row['batch_no'];
	  
			}
?>
<!DOCTYPE html>
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
            <div class="active-tab"></div>
  
            <li class="tooltip-element" data-tooltip="0">
              <a href="#" class="active" data-active="0">
                <div class="icon">
                  <i class='bx bx-tachometer'></i>
                  <i class='bx bxs-tachometer'></i>
                </div>
                <span class="link hide" onclick="run(this)">Dashboard</span>
              </a>
            </li>
			</ul>
			<ul>
			<li class="tooltip-element" data-tooltip="1">
          <a href="http://localhost/Sandamadala%20Products/customerOrder/" data-active="1">
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
          <li class="tooltip-element" data-tooltip="1">
            <a href="#" data-active="0">
              <div class="icon">
                <i class='bx bx-help-circle'></i>
                <i class='bx bxs-help-circle'></i>
              </div>
              <span class="link hide" onclick="run(this)">Help</span>
            </a>
          </li>
          <li class="tooltip-element" data-tooltip="2">
            <a href="#" data-active="1">
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
          <a href="http://localhost/Sandamadala%20Products/" class="log-out">
            <i class='bx bx-log-out'></i>
          </a>
        </div>
      </div>
      </nav>

	
	<section id="content">
	
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<?php
						 $result = mysqli_query($conn, "SELECT * FROM batches ORDER BY batch_no DESC LIMIT 1" );
						 while($row = mysqli_fetch_assoc($result)){
						?>
						<h3>Batch Number : <?php echo $row["batch_no"] ?></h3>
						<?php	
						 }
						?>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Units</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>Sale 50g</p>
								</td>
								<?php
								 $result = mysqli_query($conn, "SELECT * FROM price where batch_no=$batch_no and product='$product_1'" );
								 while($row = mysqli_fetch_assoc($result)){
								?>
								<td>Rs.<?php echo $row["updated_wholesale_price"] ?></td>
								<?php	
								 }
								?>
							</tr>
							<tr>
								<td>
									<p>Sale 100g</p>
								</td>
								<?php
								 $result = mysqli_query($conn, "SELECT * FROM price where batch_no=$batch_no and product='$product_2'" );
								 while($row = mysqli_fetch_assoc($result)){
								?>
								<td>Rs.<?php echo $row["updated_wholesale_price"] ?></td>
								<?php	
								 }
								?>
							</tr>
							<tr>
								<td>
									<p>Sale 150g</p>
								</td>
								<?php
								 $result = mysqli_query($conn, "SELECT * FROM price where batch_no=$batch_no and product='$product_3'" );
								 while($row = mysqli_fetch_assoc($result)){
								?>
								<td>Rs.<?php echo $row["updated_wholesale_price"] ?></td>
								<?php	
								 }
								?>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Stock</h3>
						
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<h4>New Stock</h4><br>
					<ul class="todo-list">
						<h4>Available Stock</h4><br>
						<li class="not-completed">
								<?php
								 $result = mysqli_query($conn, "SELECT * FROM production where batch_no=$batch_no and product='$product_1'" );
								 while($row = mysqli_fetch_assoc($result)){
								?>
								<td>50g: <?php echo $row["stock"] ?></td>
								<?php	
								 }
								?>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
						<?php
								 $result = mysqli_query($conn, "SELECT * FROM production where batch_no=$batch_no and product='$product_2'" );
								 while($row = mysqli_fetch_assoc($result)){
								?>
								<td>100g: <?php echo $row["stock"] ?></td>
								<?php	
								 }
								?>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
						<?php
								 $result = mysqli_query($conn, "SELECT * FROM production where batch_no=$batch_no and product='$product_3'" );
								 while($row = mysqli_fetch_assoc($result)){
								?>
								<td>150g: <?php echo $row["stock"] ?></td>
								<?php	
								 }
								?>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>
<?php
	}else{
		header("location: http://localhost/Sandamadala%20Products/index.php ");
	}
?>