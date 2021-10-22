<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include './links.php'?>
</head>
<body>
     <section class="quiz_box create_acc">
              <div class="create_account">
                    <div class="login-triangle"></div>
                    <h2 class="login-header">Sign Up</h2><br>
                        <form class="login-container" method="POST">
                            <p><input class="nameAcc" type="text" name="user" placeholder="username"></p><br>
                            <p><input class="email" type="email" name="email" placeholder="Email"></p><br>
                            <p><input class="pass" type="password" name="pass" placeholder="Password"></p><br>
                            <p><button class="signUp_btn" type="submit" name="submit" value="Sign Up">Sign Up</button></p>
                        </form>
                    </div>
              </div>  
     </section>
     <?php include './db.php';
          if(isset($_POST['submit'])){
              $username = $_POST["user"];
              $email = $_POST["email"];
              $password = $_POST["pass"];
              $check_email = $connection->query("SELECT email FROM `user` where email = '$email' ");
              if(mysqli_num_rows($check_email) > 0){
                  echo('Email Id Already Exists');
                  ?>
                   <br>
                  <?php
              }
              $check_name = $connection->query("SELECT name FROM `user` where name = '$username' ");
              if(mysqli_num_rows($check_name) > 0){
                  echo('Username Already Exists');
                  ?>
                   <br>
                  <?php
              }
              $insert_query = "INSERT INTO `user`(name, email, password) VALUES ('$username', '$email', '$password')";
              $query = $connection->query($insert_query);
              if(!$query){
                  die('data not inserted');
              }else{
                   header('Location: login.php');
              }
              $connection->close();
          }
     ?>
</body>
</html>