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
    <?php include './links.php'?>
</head>
<body>
      <div class="subject_container">
          <h1 style="text-align:center; padding:16px 0;">Choose Subject</h1>
             <div class="subject_wrapper">
                      <div class="subject_1">
                          <a href="./main.php?id=1&subject=Biology">
                                         <img src="./images/biology.png" alt="biology_pic">
                          </a>
                      </div>
                      <div class="subject_1">
                          <a href="./main.php?id=2&subject=Chemistry">
                                         <img src="./images/chemistry.png" alt="chemistry_pic">
                          </a>
                      </div>
                      <div class="subject_1">
                          <a href="./main.php?id=3&subject=Grammar">
                                         <img src="./images/grammar.png" alt="grammer_pic">
                          </a>
                      </div>
                      <div class="subject_1">
                          <a href="./main.php?id=4&subject=Math">
                                         <img src="./images/maths.png" alt="math_pic">
                          </a>
                      </div>
                      <div class="subject_1">
                          <a href="./main.php?id=5&subject=Physics">
                                        <img src="./images/physics.png" alt="physics_pic">
                          </a>
                      </div>
                      <div class="subject_1">
                          <a href="./main.php?id=6&subject=Prose">
                                        <img src="./images/prose.png" alt="prose_pic">
                          </a>
                      </div>
                      <div class="subject_1">
                          <a href="./main.php?id=7&subject=Poetry">
                                        <img src="./images/poetry.png" alt="poetry_pic">
                          </a>
                      </div>
             </div>            
      </div>
</body>
</html>
