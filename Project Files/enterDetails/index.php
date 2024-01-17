<?php
	session_start();
  include 'db_connection.php';
  if(isset($_SESSION['name'])){
    try{
    $is_invalid = false;
      if($_SERVER["REQUEST_METHOD"] === "POST"){

    //input data from user

    $batch_number=$_POST['batch_number'];
    $no_of_units=$_POST['no_of_units'];
    $raw_cost_per_unit=$_POST['raw_cost_per_unit'];
    $transport=$_POST['transport'];
    $current_bill=$_POST['current_bill'];
    $labor=$_POST['labor'];
    $kerosene=$_POST['kerosene'];
    $depreciation=$_POST['depreciation'];
    $wastage=$_POST['wastage'];
    $sticker=$_POST['sticker'];
    $polytene=$_POST['polytene'];
    $sale_profit=$_POST['sale_profit'];
    $retail_profit=$_POST['retail_profit'];

    //raw price for units

    $cost_for_units = $raw_cost_per_unit*$no_of_units;

    //cost for each category

    $cost_for_transport = $cost_for_units*($transport/100);
    $cost_for_current_bill = $cost_for_units*($current_bill/100);
    $cost_for_labor = $cost_for_units*($labor/100);
    $cost_for_kerosene = $cost_for_units*($kerosene/100);
    $cost_for_depreciation = $cost_for_units*($depreciation/100);
    $cost_for_sticker = $cost_for_units*($sticker/100);
    $cost_for_polytene = $cost_for_units*($polytene/100);

    //calculate cost for wastage 


    $wastage_weight = $no_of_units*($wastage/100);
    $cost_for_wastage = $wastage_weight*$raw_cost_per_unit;
    
    $useful_units = $no_of_units-$wastage_weight;

    //Total cost for units

    $tot_cost_precentage = $transport+$current_bill+$labor+$kerosene+$depreciation+$sticker+$polytene;
    $total_cost = $cost_for_units*($tot_cost_precentage/100)+$cost_for_wastage;
    $cost_per_unit = $total_cost/$no_of_units; //Total cost per unit

    //Number of unit for made each 50g ,100g and 150g packets

    $units_for_50g = $useful_units*(50/100);
    $units_for_100g = $useful_units*(25/100);
    $units_for_150g = $useful_units*(25/100);

    //Number of packs

    $packs_of_50g = $units_for_50g/50;
    $packs_of_100g = $units_for_100g/100;
    $packs_of_150g = $units_for_150g/150;

    //Total cost for made each packs
 
    $total_cost_for_50g = ($cost_per_unit*50)+($raw_cost_per_unit*50);
    $total_cost_for_100g = ($cost_per_unit*100)+($raw_cost_per_unit*100);
    $total_cost_for_150g = ($cost_per_unit*150)+($raw_cost_per_unit*150);

    //sale and retail profit according to the given precentages

    $net_profit_for_50g = $total_cost_for_50g*($sale_profit/100);
    $net_profit_for_100g = $total_cost_for_100g*($sale_profit/100);
    $net_profit_for_150g = $total_cost_for_150g*($sale_profit/100);

    $retail_profit_for_50g = $total_cost_for_50g*($retail_profit/100);
    $retail_profit_for_100g = $total_cost_for_100g*($retail_profit/100);
    $retail_profit_for_150g = $total_cost_for_150g*($retail_profit/100);

    //sale and retail prices according to the given precentages

    $sale_price_50g = $total_cost_for_50g+$net_profit_for_50g;
    $sale_price_100g = $total_cost_for_100g+$net_profit_for_100g;
    $sale_price_150g = $total_cost_for_150g+$net_profit_for_150g;

    $retail_price_50g = $total_cost_for_50g+$retail_profit_for_50g;
    $retail_price_100g = $total_cost_for_100g+$retail_profit_for_100g;
    $retail_price_150g = $total_cost_for_150g+$retail_profit_for_150g;


    //calculate profit from etch product

    $wholeSale_50g = $packs_of_50g*(75/100);
    $retail_50g = $packs_of_50g*(25/100);
    $wholeSale_100g = $packs_of_100g*(75/100);
    $retail_100g = $packs_of_100g*(25/100);
    $wholeSale_150g = $packs_of_150g*(75/100);
    $retail_150g = $packs_of_150g*(25/100);

    $profit_wholesale_50g = $wholeSale_50g*$net_profit_for_50g;
    $profit_retail_50g = $retail_50g*$retail_profit_for_50g;
    $profit_wholesale_100g = $wholeSale_100g*$net_profit_for_100g;
    $profit_retail_100g = $retail_100g*$retail_profit_for_100g;
    $profit_wholesale_150g = $wholeSale_150g*$net_profit_for_150g;
    $profit_retail_150g = $retail_150g*$retail_profit_for_150g;

    $tot_profit_50g = $profit_wholesale_50g+ $profit_retail_50g;
    $tot_profit_100g = $profit_wholesale_100g+$profit_retail_100g;
    $tot_profit_150g =  $profit_wholesale_150g+$profit_retail_150g;


    $new_sale_price_50g = 0;
    $new_sale_price_100g = 0;
    $new_sale_price_150g = 0;

    $new_retail_price_50g = 0;
    $new_retail_price_100g = 0;
    $new_retail_price_150g = 0;

    $product_1 = "50g";
    $product_2 = "100g";
    $product_3 = "150g";

    //get available stock from database

    $result0 = mysqli_query($conn, "SELECT * FROM production ORDER BY production_id DESC LIMIT 1" );
		while($row = mysqli_fetch_assoc($result0)){

      $batch_no = $row['batch_no'];
  
		}
    $result0 = mysqli_query($conn, "SELECT * FROM production where batch_no = $batch_no and product = '$product_1'" );
		while($row = mysqli_fetch_assoc($result0)){

      $old_stock_50g = $row['stock'];
  
		}
    $result0 = mysqli_query($conn, "SELECT * FROM production where batch_no = $batch_no and product = '$product_2'" );
		while($row = mysqli_fetch_assoc($result0)){

      $old_stock_100g = $row['stock'];
  
		}
    $result0 = mysqli_query($conn, "SELECT * FROM production where batch_no = $batch_no and product = '$product_3'" );
		while($row = mysqli_fetch_assoc($result0)){

      $old_stock_150g = $row['stock'];
  
		}
          
        //new available stock
        
        $available_stock_50g = $packs_of_50g+$old_stock_50g;
        $available_stock_100g = $packs_of_100g+$old_stock_100g;
        $available_stock_150g = $packs_of_150g+$old_stock_150g;


    //adding data to the database

    $query="INSERT INTO batches(batch_no,no_of_units,raw_cost_per_unit,raw_cost_for_units,useful_units,wastage, transport,
     depreciation, cerosene, labor, polythene,sticker, electricity, wastage_cost, transport_cost, depreciation_cost, 
     cerosene_cost, labor_cost, polythene_cost, sticker_cost,electricity_cost,tot_cost_per_unit, tot_cost)
            VALUE(". $batch_number.",". $no_of_units.",". $cost_per_unit.",". $cost_for_units.",". $useful_units.",". $wastage.",".
             $transport.",". $depreciation.",". $kerosene.",". $labor.",". $polytene.",".$sticker.",". $current_bill.",
             ". $cost_for_wastage.",". $cost_for_transport.",". $cost_for_depreciation.",". $cost_for_kerosene.",". $cost_for_labor.",
             ". $cost_for_polytene.",".$cost_for_sticker.",". $cost_for_current_bill.",".$cost_per_unit.",".$total_cost.")";

    $result = mysqli_query($conn,$query);

    $query1= "INSERT INTO price(batch_no,product,suggested_wholesale_price,suggested_retail_price,updated_wholesale_price,updated_retail_price
      ,net_profit,tot_profit)
             VALUE(". $batch_number.",'". $product_1."',".$sale_price_50g.",".$retail_price_50g.",".$new_sale_price_50g.",
             ". $new_retail_price_50g.",".$net_profit_for_50g.",".$tot_profit_50g.")";
    
    $result1 = mysqli_query($conn,$query1);

    $query2= "INSERT INTO price(batch_no,product,suggested_wholesale_price,suggested_retail_price,updated_wholesale_price,
      updated_retail_price,net_profit,tot_profit)
             VALUE(". $batch_number.",'". $product_2."',".$sale_price_100g.",".$retail_price_100g.",".$new_sale_price_100g.",
             ". $new_retail_price_100g.",".$net_profit_for_100g.",".$tot_profit_100g.")";
     
     $result2 = mysqli_query($conn,$query2);

    $query3= "INSERT INTO price(batch_no,product,suggested_wholesale_price,suggested_retail_price,updated_wholesale_price,
      updated_retail_price,net_profit,tot_profit)
             VALUE(". $batch_number.",'". $product_3."',".$sale_price_150g.",".$retail_price_150g.",".$new_sale_price_150g.",
             ". $new_retail_price_150g.",".$net_profit_for_150g.",".$tot_profit_150g.")";
     
     $result3 = mysqli_query($conn,$query3);

    $query4= "INSERT INTO production(batch_no,product,qty,stock)
             VALUE(".$batch_number.",'". $product_1."',".$packs_of_50g.",".$available_stock_50g.")";

    $result4 = mysqli_query($conn,$query4);

    $query5= "INSERT INTO production(batch_no,product,qty,stock)
              VALUE(". $batch_number.",'". $product_2."',".$packs_of_100g.",".$available_stock_100g.")";

      $result5 = mysqli_query($conn,$query5);

    $query6= "INSERT INTO production(batch_no,product,qty,stock)
              VALUE(". $batch_number.",'". $product_3."',".$packs_of_150g.",".$available_stock_150g.")";
    
    $result6 = mysqli_query($conn,$query6);

    $query7= "INSERT INTO product(batch_no,product,cost)
              VALUE(". $batch_number.",'". $product_1."',".$total_cost_for_50g.")";
    
    $result7 = mysqli_query($conn,$query7);

    $query8= "INSERT INTO product(batch_no,product,cost)
              VALUE(". $batch_number.",'". $product_2."',".$total_cost_for_100g.")";
    
    $result8 = mysqli_query($conn,$query8);

    $query9= "INSERT INTO product(batch_no,product,cost)
              VALUE(". $batch_number.",'". $product_3."',".$total_cost_for_150g.")";
    
    $result9 = mysqli_query($conn,$query9);
     

    ?>
            <script>
            alert("New batch Successfully added");
            </script>     
    <?php 

    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Enter Details </title>
    
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
        <div class="active-tab"></div>
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

    <!--Input Form starts here-->
    <div class="container">
    
      <div class="title">Enter Details</div>
    
      <div class="content">
      
        <form  method="POST">
          <div class="user-details">

            <div class="input-box">
            <?php if($is_invalid ): ?>
                <em>Invalid Input</em>
                <?php endif; ?>
              <span class="details">Batch Number</span>
              <input type="text" name="batch_number" placeholder="Enter batch number" required>
            </div>

            <div class="input-box">
              <span class="details">Raw Material</span>
              <input type="text" name="no_of_units" placeholder="Enter number of Units (g)" required>
            </div>

            <div class="input-box">
              <span class="details">Unit Price</span>
              <input type="text" name="raw_cost_per_unit" placeholder="Enter unit price" required>
            </div>

            <div class="input-box">
              <span class="details">Transport</span>
              <input type="text" name="transport" placeholder="Enter transport percentage" required>
            </div>

            <div class="input-box">
              <span class="details">Electricity Bill</span>
              <input type="text" name="current_bill" placeholder="Enter electricity percentage" required>
            </div>

            <div class="input-box">
              <span class="details">Labor Cost</span>
              <input type="text" name="labor" placeholder="Enter labor percentage" required>
            </div>

            <div class="input-box">
              <span class="details">Kerosene</span>
              <input type="text" name="kerosene" placeholder="Enter percentage for kerosene" required>
            </div>

            <div class="input-box">
              <span class="details">Depreciation</span>
              <input type="text" name="depreciation" placeholder="Enter depreciation percentage" required>
            </div>

            <div class="input-box">
              <span class="details">Wastage</span>
              <input type="text"name='wastage' placeholder="Enter wastage percentage" required>
            </div>

            <div class="input-box">
              <span class="details">Sticker</span>
              <input type="text" name="sticker" placeholder="Enter percentage for sticker" required>
            </div>

            <div class="input-box">
              <span class="details">Polythene</span>
              <input type="text" name="polytene" placeholder="Enter percentage for polytene" required>
            </div>

            <div class="input-box">
              <span class="details">Sale profit</span>
              <input type="text" name="sale_profit" placeholder="Enter Sale Profit percentage" required>
            </div>

            <div class="input-box">
              <span class="details">Retail profit</span>
              <input type="text" name="retail_profit" placeholder="Enter Retail Profit percentage" required>
            </div>

          </div>

          <div class="button">
            <input type="submit"  value="Submit">
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
        window.location.href = "http://localhost/Sandamadala%20Products/enterDetails/index.php"
        </script>
        <?php
        }
          
  }else{
    header("location: http://localhost/Sandamadala%20Products/index.php ");
  }
?>
