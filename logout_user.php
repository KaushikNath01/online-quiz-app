<?php include './db.php'; 
       session_start();
       if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true){
              Header("Location: login.php");
       }
       session_destroy();
       $query = "UPDATE user SET active_user = '0' WHERE name = '$username'";
       $connectQ = $connection->query($query); 
       header("Location: login.php");
?>

