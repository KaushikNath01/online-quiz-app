<?php 
      include './db.php';
      $id = $_GET['id'];
      $del_q = "DELETE FROM `user` WHERE user_id = $id";
      $del_id = $connection->query($del_q);
      if($del_id){
        header("Location: remove.php");
      }
?>