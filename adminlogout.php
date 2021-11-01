<?php include './db.php'; 
       session_start();
       if(!isset($_SESSION['adminloggedIn']) || $_SESSION['adminloggedIn'] != true){
           Header("Location: adminlogin.php");
       }
       session_destroy();
       header("Location: adminlogin.php");
?>
