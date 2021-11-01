<?php include './db.php'; 
       session_start();
       if(!isset($_SESSION['adminloggedIn']) || $_SESSION['adminloggedIn'] != true){
           Header("Location: adminlogin.php");
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <?php include './links.php';?>
    <style>
           body{
                margin: 0; 
                padding:0;
           }
            th{
                border-top:none;
                border-bottom:1px solid grey;
                border-left:1px solid grey;
                border-right:none;
            } 
    </style>
</head>
<body>
       <?php
               $get_users = "SELECT * FROM `user`";
               $query = $connection->query($get_users);
               $num_rows = mysqli_num_rows($query);
       ?>
       <div class=" quiz_box user_table" style=" height:100vh; display: grid; place-item:center; width:100%;">
                <h1 style="text-align:center; padding:10px 0; heigth:10vh;">List of Users</h1>
                <div class="user_wrapper" style="width:80%; margin:auto;height:90vh; display:grid;place-item:center;background-color:#CDF0EA;">
                       <table>
                               <thead>
                                       <tr>
                                             <th>User Id</th>
                                             <th>Username</th>
                                             <th>Email</th>
                                             <th>Password</th>
                                             <th style="border-right:1px solid grey;">Active User</th>
                                       </tr>
                               </thead>
                               <tbody style="margin:0 0 0 30px; ">
                                        <?php
                                              while($num_array = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                             <th><?php echo $num_array['user_id'] ?></th>
                                             <th><?php echo $num_array['name'] ?></th>
                                             <th><?php echo $num_array['email'] ?></th>
                                             <th><?php echo $num_array['password'] ?></th>
                                             <th style="border-right:1px solid grey;"><?php echo $num_array['active_user'] ?></th>
                                        </tr>
                                        <?php
                                          }
                                        ?>
                               </tbody>
                       </table>
                </div>
       </div>
</body>
</html>