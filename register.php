<?php
   session_start();

   include("conn.php");
   
   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
      $user_name = $_POST['name'];
      $email = $_POST['mail'];
      $birth = $_POST['bdate'];
      $password = md5($_POST['password']);
      $Cpassword = md5($_POST['cpassword']);


      if(!empty($email) && !empty($password) && !is_numeric($email))
      {

         $query = "insert into client (name, email, bdate, password) values ('$user_name','$email','$birth','$password')";
         mysqli_query($con, $query);
         header("Location: register.php");
         die;
      }
      else
      {
         echo "Please enter some valid information!";
      }
   }
?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="mail" required placeholder="enter your email">
      <input type="date" name="bdate" required placeholder="Birthdate">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>