<?php
  include 'db_connection.php';
  session_start();
  if(isset($_SESSION['name'])){
    try{
  if($_SERVER["REQUEST_METHOD"] === "POST"){

    $product_1 = "50g";
    $product_2 = "100g";
    $product_3 = "150g";

    $date = $_POST['sales_date'];
    $formatted_date = date("Y-m-d", strtotime($date));
    $salesman_name = $_SESSION['name'];
    $invoice_no = $_POST['invoice_number'];
    $customer = $_POST['customer'];
    $no_50g = $_POST['no_50g'];
    $no_100g = $_POST['no_100g'];
    $no_150g = $_POST['no_150g'];

    $result = mysqli_query($conn, "SELECT * FROM production ORDER BY production_id DESC LIMIT 1" );
		while($row = mysqli_fetch_assoc($result)){

      $batch_no = $row['batch_no'];
  
		}

    $result = mysqli_query($conn, "SELECT * FROM price where batch_no = $batch_no and product = '$product_1'" );
		while($row = mysqli_fetch_assoc($result)){

      $retail_price_50g = $row['updated_retail_price'];
  
		}
    $result = mysqli_query($conn, "SELECT * FROM price where batch_no = $batch_no and product = '$product_2'" );
		while($row = mysqli_fetch_assoc($result)){

      $retail_price_100g = $row['updated_retail_price'];
  
		}
    $result = mysqli_query($conn, "SELECT * FROM price where batch_no = $batch_no and product = '$product_3'" );
		while($row = mysqli_fetch_assoc($result)){

      $retail_price_150g = $row['updated_retail_price'];
  
		}

    $result = mysqli_query($conn, "SELECT * FROM production where batch_no = $batch_no and product = '$product_1'" );
		while($row = mysqli_fetch_assoc($result)){

      $available_stock_50g = $row['stock'];
  
		}
    $result = mysqli_query($conn, "SELECT * FROM production where batch_no = $batch_no and product = '$product_2'" );
		while($row = mysqli_fetch_assoc($result)){

      $available_stock_100g = $row['stock'];
  
		}
    $result = mysqli_query($conn, "SELECT * FROM production where batch_no = $batch_no and product = '$product_3'" );
		while($row = mysqli_fetch_assoc($result)){

      $available_stock_150g = $row['stock'];
  
		}

    $amount_50g = ($no_50g*$retail_price_50g);
    $amount_100g = ($no_50g*$retail_price_100g);
    $amount_150g = ($no_50g*$retail_price_150g);

    $amount = $amount_50g+ $amount_100g+ $amount_150g;

    $updated_stock_50g = $available_stock_50g-$no_50g;
    $updated_stock_100g = $available_stock_100g-$no_100g;
    $updated_stock_150g = $available_stock_150g-$no_150g;

    $query1="INSERT INTO sales_header(date,invoice_no,salesman_name,customer,amount) VALUES('.$formatted_date.','.$invoice_no.','".$salesman_name."','".$customer."',".$amount.")";
    $result=mysqli_query($conn,$query1);

    $result0 = mysqli_query($conn, "SELECT * FROM sales_header ORDER BY sales_id DESC LIMIT 1" );
		while($row = mysqli_fetch_assoc($result0)){

      $sales_id = $row['sales_id'];
  
		}

    $query2="INSERT INTO sales_details(sales_id,product,qty,amount) VALUES('.$sales_id.','".$product_1."','.$no_50g.',".$amount_50g.")";
    $result=mysqli_query($conn,$query2);

    $query3="INSERT INTO sales_details(sales_id,product,qty,amount) VALUES('.$sales_id.','".$product_2."','.$no_100g.',".$amount_100g.")";
    $result=mysqli_query($conn,$query3);

    $query4="INSERT INTO sales_details(sales_id,product,qty,amount) VALUES('.$sales_id.','".$product_3."','.$no_150g.',".$amount_150g.")";
    $result=mysqli_query($conn,$query4);

    $sql1 = "UPDATE production SET stock ='$updated_stock_50g' WHERE batch_no=$batch_no and product='$product_1'";
    $result=mysqli_query($conn,$sql1);

    $sql2 = "UPDATE production SET stock ='$updated_stock_100g' WHERE batch_no=$batch_no and product='$product_2'";
    $result=mysqli_query($conn,$sql2);

    $sql3 = "UPDATE production SET stock ='$updated_stock_150g' WHERE batch_no=$batch_no and product='$product_3'";
    $result=mysqli_query($conn,$sql3);

    ?>
    <script>alert('Record updated successfully');</script>
    <?php
 
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update Sales </title>
    
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
            <div class="active-tab"></div>
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
    <!--side menu bar ends here-->

    <!--Input Form starts here-->
    <div class="container">
    
      <div class="title">Update Sales</div>
    
      <div class="content">
      
        <form  method="POST">
          <div class="user-details">

            <div class="input-box">
              <span class="details">Date:</span>
              <input type="date" name="sales_date" required>
            </div>

            <div class="input-box">
              <span class="details">Invoice Number:</span>
              <input type="text" name="invoice_number" placeholder="Enter invoice number" required>
            </div>

            <div class="input-box">
              <span class="details">Shop Name:</span>
              <input type="text" name="customer" placeholder="Enter shop name" required>
            </div>

            <div class="input-box">
              <span class="details">50g:</span>
              <input type="text" name="no_50g" placeholder="Enter number of 50g" required>
            </div>

            <div class="input-box">
              <span class="details">100g:</span>
              <input type="text" name="no_100g" placeholder="Enter number of 100g" required>
            </div>

            <div class="input-box">
              <span class="details">150g:</span>
              <input type="text" name="no_150g" placeholder="Enter number of 150g" required>
            </div>
          </div>

          <div class="button">
            <input type="submit" value="Submit">
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
        window.location.href = "http://localhost/Sandamadala%20Products/salesmanUpdateSales/"
        </script>
        <?php
    }
	}else{
		header("location: http://localhost/Sandamadala%20Products/index.php ");
	}
?>
