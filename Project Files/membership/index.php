<?php 
try{
   $is_invalid = false;//check name or password is valid

   //To detect if the form has been submitted.
   if($_SERVER["REQUEST_METHOD"] === "POST"){
      

      $mysqli = require __DIR__ ."/db_connection.php";//connect to the database.

      $name=$_POST['name'];
      $password=$_POST['password'];
      $salt = "sandamadala_products";
      $password_encrypted = sha1($password.$salt);


      $sql = mysqli_query($conn, "SELECT count(*) as total from user WHERE user_name = '".$name."' and user_password = '".$password_encrypted."'");

      $result = mysqli_fetch_array($sql);


      session_start();

      session_regenerate_id();
      
      if($result["total"] > 0){   //check name and password is valid
            
         $_SESSION["name"] = $name;
         
         $result = mysqli_query($conn, "SELECT * FROM user where user_name= '".$name."' and user_password='".$password_encrypted."'" );
         while($row = mysqli_fetch_assoc($result)){
            $user_role = $row["user_position"];
         }
         if($user_role=="Manager"){
            header("Location: http://localhost/Sandamadala%20Products/dashboard/");
           $is_invalid = false;
           exit;
         }elseif($user_role=="Salesman"){
            header("Location: http://localhost/Sandamadala%20Products/salesmandashboard/");
           $is_invalid = false;
           exit;
         }else{
            header("Location: http://localhost/Sandamadala%20Products/customerDashboard/");
           $is_invalid = false;
           exit;
         }

      }else{
         $is_invalid = true;
      }
   }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">

      <title>Login </title>

      <link rel="stylesheet" href="style.css">

   </head>

   <body>
      <div class="heading">Welcome Back!</div>
      <div class="wrapper">
         <div class="title">
            Login Form
         </div>

         <form method="post">

            <?php if($is_invalid): ?>

            <em>Invalid login</em>

            <?php endif; ?>

            <div class="field">
               <input type="text" name="name" id="name" value="<?= htmlspecialchars($_POST["name"] ?? "")?>" required>
               <label>Username</label>
            </div>

            <div class="field">
               <input type="password" name="password" id="password" minlength="8" maxlength="15" required>
               <label>Password</label>
            </div>

            <div class="field">
               <input type="submit" value="Login">
            </div>
         </form>
      </div>
   </body>
</html>
<?php
}catch(Exception $e){
	?>
	<script>
	  alert('Invalid Input');
	  window.location.href = "http://localhost/Sandamadala%20Products/membership/index.php"
	  </script>
	  <?php
  }
?>