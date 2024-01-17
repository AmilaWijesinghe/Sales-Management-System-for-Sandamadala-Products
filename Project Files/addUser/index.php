<?php
    session_start();
    if(isset($_SESSION['name'])){
     
      $is_invalid = false;
      if($_SERVER["REQUEST_METHOD"] === "POST"){

        $mysqli = require __DIR__ . "/db_connection.php";

        $name=$_POST['name']; 
        $email=$_POST['email'];
        $position=$_POST['position'];
        $password=$_POST['password'];
        $salt = "sandamadala_products";
        $password_encrypted = sha1($password.$salt);

          $query="INSERT INTO user(user_name,user_email,user_position,user_password) VALUES('".$name."','".$email."','".$position."','".$password_encrypted."')";

          if ($conn->query($query) === TRUE) {
            ?>
            <script>
                alert('Account Successfully Created');
            </script>
            <?php
    
          } else {
            $is_invalid = true;
          }
        }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
     
    <title> Add User</title>

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
        <div class="active-tab"></div>
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
    
      <div class="title">Add User</div>
    
      <div class="content">
        <form method="post">
          <div class="user-details">

                <?php if($is_invalid ): ?>
                <em>Invalid Input</em>
                <?php endif; ?>

            <div class="input-box">
              <span class="details">User Role :</span>
                <select name="position" required>
						      <option value="">Select user role</option>
                  <option value="Manager">Manager</option>
                  <option value="Salesman">Salesman</option>
						    </select>
            </div>

            <div class="input-box">
              <span class="details">Userame :</span>
              <input type="text" name="name" id="name" placeholder="Enter username" required>
           </div>

            <div class="input-box">
              <span class="details">E-mail :</span>
              <input type="text" name="email" id="email" placeholder="Enter e-mail" required>
            </div>

            <div class="input-box">
              <span class="details">Password :</span>
              <input type="password" name="password" id="password" placeholder="Enter password" minlength="8" maxlength="15" required>
            </div>
          </div>

          <div class="button">
            <input type="submit" value="Save">
          </div>
        </form>
      </div>
    </div>

  </body>
</html>

<?php
    }else{
      header("location: http://localhost/Sandamadala%20Products/index.php ");
   }
?>