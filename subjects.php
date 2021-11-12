<?php include './db.php'; 
     session_start();
	 if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true){
            Header("Location: login.php");
	 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <?php include './links.php';
        //   $username = $_SESSION['username'];
        //   $check_exist = $connection->query("SELECT username,is_submit FROM `result` where username = '$username' AND is_submit = '1'");
        //   if(mysqli_num_rows($check_exist) > 0){
        //       echo "subject already completed";
        //   }
        $bio = base64_encode('Biology');
        $chem = base64_encode('Chemistry');
        $eng = base64_encode('English');
        $math = base64_encode('Math');
        $phy = base64_encode('Physics');
        $poetry = base64_encode('Poetry');                                                                                      
    ?>
</head>
<body>
      <?php include 'logoutBtn.php'; ?>
      <div class="subject_container">
          <h1 style="text-align:center; padding:16px 0;">Choose Subject</h1>
             <div class="subject_wrapper">
                      <div class="subject_1">
                          <a href="./main.php?id=1&subject=<?php echo $chem?>">
                                         <img src="./images/chemistry.png" alt="chemistry_pic">
                          </a>
                      </div>
                      <div class="subject_1">
                          <a href="./main.php?id=2&subject=<?php echo $math?>">
                                         <img src="./images/maths.png" alt="math_pic">
                          </a>
                      </div>
                      <div class="subject_1 ">
                          <a class="biology" href="./main.php?id=3&subject=<?php echo $bio?>">
                                         <img src="./images/biology.png" alt="biology_pic">
                          </a>
                      </div>
                      <div class="subject_1">
                          <a href="./main.php?id=4&subject=<?php echo $phy?>">
                                        <img src="./images/physics.png" alt="physics_pic">
                          </a>
                      </div>
                      <div class="subject_1">
                          <a href="./main.php?id=5&subject=<?php echo $eng?>">
                                         <img src="./images/grammar.png" alt="english_pic">
                          </a>
                      </div>
                      <!-- <!-- <div class="subject_1">
                          <a href="./main.php?id=6&subject=Prose">
                                        <img src="./images/prose.png" alt="prose_pic">
                          </a>
                      </div> -->
                      <!-- <div class="subject_1">
                          <a href="./main.php?id=5&subject=<?php echo $poetry?>">
                                        <img src="./images/poetry.png" alt="poetry_pic">
                          </a>
                      </div>  -->
             </div>            
      </div>
</body>
</html>
