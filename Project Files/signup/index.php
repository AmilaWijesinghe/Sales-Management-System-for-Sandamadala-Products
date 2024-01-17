<?php 
try{
   $is_invalid = false;//check name or password is valid

   //To detect if the form has been submitted.
   if($_SERVER["REQUEST_METHOD"] === "POST"){

      $mysqli = require __DIR__ ."/db_connection.php";//connect to the database.



      $name=$_POST['name']; 
      $email=$_POST['mail'];
      $position= "Customer";
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
          header("location: http://localhost/Sandamadala%20Products/membership/index.php ");
  
        } else {
          $is_invalid = true;
        }

   }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">

      <title>sign up </title>

      <link rel="stylesheet" href="style.css">

   </head>

   <body>
      <div class="heading">Start your journey!</div>
      <div class="wrapper">
         <div class="title">
            Sign up
         </div>

         <form method="post">

            <?php if($is_invalid): ?>

            <em>Invalid login</em>

            <?php endif; ?>

            <div class="field">
               <input type="text" name="name" id="name" value="" required>
               <label>Username</label>
            </div>

            <div class="field">
               <input type="text" name="mail" id="mail" value="" required>
               <label>E-mail</label>
            </div>

            <div class="field">
               <input type="password" name="password" id="password" minlength="8" maxlength="15" required>
               <label>Password</label>
            </div>

            <div class="field">
               <input type="submit" value="Sign up">
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
     window.location.href = "http://localhost/Sandamadala%20Products/signup/"
     </script>
     <?php
 }
?>