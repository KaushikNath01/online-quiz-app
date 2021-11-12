<?php 
		include 'db.php';
		session_start();
		if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true){
            Header("Location: login.php");
	    }
?>
<html>
<head>
	<title>EduAid Quiz App</title>
	<?php include './links.php';
	       $subject = $_GET['subject'];
		   $subject_selected = $_GET['id'];
	       echo $subject_selected;
		   $query = "SELECT * FROM question_table WHERE quiz_id = $subject_selected";
	       $total_questions = mysqli_num_rows(mysqli_query($connection,$query));
	?>
	<?php 
	       $subject = base64_decode($_GET['subject']);
	       $username = $_SESSION['username'];
	       $check_exist = $connection->query("SELECT username,subject FROM `result` WHERE username = '$username' AND subject = '$subject'");
		   if(mysqli_num_rows($check_exist) > 0){
			   header("Location:subjects.php");
			//    session_destroy();
		   }
	?>
</head>
<body?>
    <?php include 'logoutBtn.php'; ?>
	<main class="quiz_box main_container" style="width:600px; height:400px; background-color:white;">
			<div class="main_wrapper">
				<h2>Test Your <span style="color:#f15b5b;"><?php echo $subject;?></span> Knowledge</h2><br>
				<p>
					This is a multiple choise quiz to test your Knowledge.
				</p><br>
				<ul>
					<li><strong>Applicant:  </strong><?php echo $_SESSION['username'] ?></li>
					<li><strong>Subject:  </strong><?php echo $subject; ?></li>
					<li><strong>No of Questions: </strong><?php echo $total_questions; ?></li>
					<li><strong>Type:</strong> Multiple Choice</li>
					<li><strong>Estimated Time:</strong> <?php echo $total_questions*1; ?> min</li>
				</ul><br>
				<div class="main_btn">               
				       <a href="question.php?n=1&id=<?php echo $subject_selected;?>&subject=<?php echo base64_encode($subject);?>" class="startTimer" name="start">Start Quiz</a>
				</div>
			</div>
	</main>
</body>
</html>
