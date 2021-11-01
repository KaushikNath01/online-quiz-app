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
    <title>Rankings</title>
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
               $get_users = "SELECT * FROM `result` ORDER BY score DESC";
               $query = $connection->query($get_users);
               $num_rows = mysqli_num_rows($query);
?>
       <div class=" quiz_box user_table" style=" height:100vh; display: grid; place-item:center; width:100%;">
                <h1 style="text-align:center; padding:10px 0; heigth:10vh;">User Ranking</h1>
                <div class="user_wrapper" style="width:80%; margin:auto;height:90vh; display:grid;place-item:center;background-color:#EEEEEE;">
                       <table>
                               <thead>
                                       <tr>
                                             <th>Result Id</th>
                                             <th>Quiz Id</th>
                                             <th>Username</th>
                                             <th>Subject</th>
                                             <th>Score</th>
                                             <th style="border-right:1px solid grey;">is submit</th>
                                       </tr>
                               </thead>
                               <tbody>
                                        <?php
                                              while($num_array = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                             <th><?php echo $num_array['result_id'] ?></th>
                                             <th><?php echo $num_array['quiz_id'] ?></th>
                                             <th><?php echo $num_array['username'] ?></th>
                                             <th><?php echo $num_array['subject'] ?></th>
                                             <th><?php echo $num_array['score'] ?></th>
                                             <th style="border-right:1px solid grey;"><?php echo $num_array['is_submit'] ?></th>
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