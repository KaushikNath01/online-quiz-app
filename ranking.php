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
                border-bottom:.5px solid lightgray;
            } 
    </style>
</head>
<body>
<?php        
               $get_users = "SELECT * FROM `result` ORDER BY score DESC";
               $query = $connection->query($get_users);
               $num_rows = mysqli_num_rows($query);
?>
<script>
                   $(document).ready( function () {
                        $('#myTable').DataTable();
                   } );
</script>
       <div class="user_table" style="width:90%;margin:auto;">
                <h1 style="text-align:center; padding:10px 0;">User Ranking</h1>
                <div class="user_wrapper">
                       <table id="myTable" style="background-color:#EDEDED">
                               <thead>
                                       <tr>
                                             <th>Result Id</th>
                                             <th>Quiz Id</th>
                                             <th>Username</th>
                                             <th>Subject</th>
                                             <th>Total ques</th>
                                             <th>Score</th>
                                             <th>is submit</th>
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
                                             <th><?php echo $num_array['total_questions'] ?></th>
                                             <th><?php echo $num_array['score'] ?></th>
                                             <th><?php echo $num_array['is_submit'] ?></th>
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