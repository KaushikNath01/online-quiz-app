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
	 <?php include 'logoutBtn.php'; ?>
     <main class="quiz_box index_container" style="display:flex; flex-direction:column;justify-content:center; align-item:center">
		    <h2>Hello <span style="color:blue;"><?php echo $_SESSION['username'] ?></span></h2>
			<div class = "menu" style="padding-top:30px;">
					<a href="subjects.php" class="Qbutton"><button style="background:transparent; outline:none; border:none; cursor:pointer; width:240px;height:50px; background-color:rgb(77, 93, 235); color:white;  font-size:19px;" class="take_quiz">Take Quiz</button></a><br><br>
					<!-- <a href="add.php" class="Qbutton"><button style="background:transparent; outline:none; border:none; cursor:pointer; width:240px;height:50px; background-color:rgb(77, 93, 235); color:white;  font-size:19px;" class="add_ques">Add questions</button></a> -->
			</div>
	</main>
</body>
</html>