<?php include './db.php';
    session_start();
    if(!isset($_SESSION['adminloggedIn']) || $_SESSION['adminloggedIn'] != true){
        Header("Location: adminlogin.php");
 }
?>
<?php 
     $select_now = "SELECT user_id FROM `user`";
     $ss = $connection->query($select_now);
     $users = mysqli_num_rows($ss);

     $select_now = "SELECT result_id FROM `result`";
     $ss = $connection->query($select_now);
     $test_taken = mysqli_num_rows($ss);

     $select_now = "SELECT score FROM `result` WHERE score >= 2";
     $ss = $connection->query($select_now);
     $test_passed = mysqli_num_rows($ss);

     $select_now = "SELECT score FROM `result` WHERE score < 2";
     $ss = $connection->query($select_now);
     $test_failed = mysqli_num_rows($ss);

     $select_now = "SELECT subject FROM `quiz_app`";
     $ss = $connection->query($select_now);
     $total_subject = mysqli_num_rows($ss);

     $select_now = "SELECT active_user FROM `user` WHERE active_user = 1";
     $ss = $connection->query($select_now);
     $active_user = mysqli_num_rows($ss);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./main.css">
    <style>
            nav{
                height:10vh;
            }
            ul{
                width: 90%;
                margin:auto;
                height:100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            a{
                color: white;
                font-size:17px;
            }
            .mid{
                heigth:90vh;
                width:100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .content-board-menu{
                text-align:center;
                display: grid;
                place-content: center;
                grid-template-columns: repeat( auto-fit, minmax(250px, 1fr) );
                grid-gap:3.2em;
                height:100%;
                width:90%;
                margin:auto;
                background-color:white;
            }
            .div{
                height:200px;
                width:300px;
                display:grid;
                place-content:center;
                border-radius:12px;
                font-size:19px;
            }
    </style>
</head>
<body>
       <header class="header-top" style="height:10vh;width:100%;background-color:#2978B5; color:white;">
                 <nav style="width:80%;margin:auto;">
                        <ul>
                              <a href="#">
                                   <li class="dash">Dashboard</li>
                              </a>
                              <a href="users.php">
                                   <li>Users</li>
                              </a>
                              <a href="ranking.php">
                                   <li>Ranking</li>
                              </a>
                              <a href="add.php">
                                   <li>Add Quiz</li>
                              </a>
                              <a href="remove.php">
                                   <li>Edit User</li>
                              </a>
                              <a style="height:44px;width:120px;background-color:#FF5C58;color:white;outline:none;border:none; display:grid; place-content:center;cursor:pointer;" href="adminlogout.php">
                                   <li>Logout</li>
                              </a>
                        </ul>
                 </nav>
       </header>
       <div class="mid">
                <section class="content-board-menu" style="color:white;">
                                    <div class="div" style="background-color:#FF0075;">
                                          <h4>Total students enrolled</h4><br>
                                          <h4 style="color:white;"><?php echo $users; ?></h4>
                                    </div> 
                                    <div class="div" style="background-color:#FFB085;">
                                          <h4>Total Test taken</h4><br>
                                          <h4 style="color:white;"><?php echo $test_taken; ?></h4>
                                    </div> 
                                    <div class="div" style="background-color:#D62AD0;">
                                          <h4>Active users</h4><br>
                                          <h4 style="color:white;"><?php echo $active_user; ?></h4>
                                    </div> 
                                    <div class="div" style="background-color:#FF7777;">
                                          <h4>Tests Passed</h4><br>
                                          <h4 style="color:white;"><?php echo $test_passed; ?></h4>
                                    </div> 
                                    <div class="div" style="background-color:#F56FAD;">
                                          <h4>Total courses available</h4><br>
                                          <h4 style="color:white;"><?php echo $total_subject; ?></h4>
                                    </div> 
                                    <div class="div" style="background-color:#9B72AA;">
                                          <h4>Tests Failed</h4><br>
                                          <h4 style="color:white;"><?php echo $test_failed; ?></h4>
                                    </div> 
                </section>
       </div>
</body>
</html>