<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <?php include './links.php'?>
</head>
<body>
     <section class="quiz_box create_acc">
              <div class="create_account">
                    <div class="login-triangle"></div>
                    <h2 class="login-header">Admin Log in</h2><br>
                        <form class="login-container" method="POST">
                            <p><input class="nameAcc" type="text" name="user" placeholder="username"></p><br>
                            <p><input class="email" type="email" name="email" placeholder="Email"></p><br>
                            <p><input class="pass" type="password" name="pass" placeholder="Password"></p><br>
                            <p><button class="signUp_btn" type="submit" name="submit" value="Sign Up">Log Up</button></p>
                        </form>
                    </div>
              </div>  
     </section>
     <?php include './db.php';
          if(isset($_POST['submit'])){
              $username = $_POST["user"];
              $email = $_POST["email"];
              $password = $_POST["pass"];
              $check_admin = $connection->query("SELECT * FROM `admin` where email = '$email' AND password = '$password'");
              if(mysqli_num_rows($check_admin) > 0){
                     session_start();
                     $_SESSION['adminloggedIn'] = true;
                     $_SESSION['username'] = $username;
                     header('Location:admin.php');
                  ?>
                   <br>
                  <?php
              }
              $connection->close();
          }
     ?>
</body>
</html>