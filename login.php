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
     <section class=" quiz_box login_page">
        <div class="login">
            <div class="login-triangle"></div>
            <h2 class="login-header">Log in</h2><br>
                <form class="login-container" method="POST">
                    <p><input class="nameAcc" name="loginUser" type="text" placeholder="Username"></p><br>
                    <p><input class="pass" name="loginPass" type="password" placeholder="Password"></p><br>
                    <p><input class="login_btn" name="loginBtn" type="submit" value="Log in"></p>
                </form>
            </div>
       </div>
     </section>
      <?php include './db.php';
            if(isset($_POST['loginBtn'])){
                $username = $_POST["loginUser"];
                $password = $_POST["loginPass"];
                $sql = "SELECT * FROM `user` where name = '$username' AND password = '$password'";
                $result = $connection->query($sql);
                $num = mysqli_num_rows($result);
                if($num > 0){
                    session_start();
                    $login = true;
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['username'] = $username;
                    header('Location: options.php');
                }else{
                    echo 'invalid crediantials';
                }
            }
      ?>
</body>
</html>