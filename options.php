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
	<title>EduAid Quiz App</title>
	<?php include './links.php'; ?>
</head>
<body>
	 Hello <?php echo $_SESSION['username'] ?>
     <main class="quiz_box index_container">
			<div class = "menu">
					<a href="subjects.php" class="Qbutton"><button style="background:transparent; outline:none; border:none; cursor:pointer; width:240px;height:50px; background-color:rgb(77, 93, 235); color:white;  font-size:19px;" class="take_quiz">Take Quiz</button></a><br><br>
					<a href="add.php" class="Qbutton"><button style="background:transparent; outline:none; border:none; cursor:pointer; width:240px;height:50px; background-color:rgb(77, 93, 235); color:white;  font-size:19px;" class="add_ques">Add questions</button></a>
			</div>
	</main>
</body>
</html>