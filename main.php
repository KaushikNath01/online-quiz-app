<?php 
		include 'db.php';
		session_start();
		if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true){
            Header("Location: login.php");
	    }
		// $quizid = $_GET['quizid'];
		// $query = "SELECT * FROM question_table where quiz_id =". $quizid;
		// $total_questions = mysqli_num_rows($connection->query($query));
		// $quizid = base64_encode($quizid);
		$query = "SELECT * FROM question_table";
        $total_questions = mysqli_num_rows(mysqli_query($connection,$query));
?>
<html>
<head>
	<title>EduAid Quiz App</title>
	<?php include './links.php';
	       $subject = $_GET['subject'];
	?>
	<?php include './links.php';
	       $subject = $_GET['subject'];
	       $username = $_SESSION['username'];
	       $check_exist = $connection->query("SELECT username,subject FROM `result` WHERE username = '$username' AND subject = '$subject'");
		   if(mysqli_num_rows($check_exist) > 0){
			?>
					<script>
							alert("Test is already completed");
					</script>
	        <?php
			   header("Location:subjects.php");
			   
			//    session_destroy();
		   }
	?>
</head>
<body?>
	<main class="quiz_box main_container" style="width:600px; height:400px; background-color:white;">
			<div class="main_wrapper">
				<h2>Test Your <span style="color:#f15b5b;"><?php echo $subject;?></span> Knowledge</h2><br>
				<p>
					This is a multiple choise quiz to test your Knowledge.
				</p><br>
				<ul>
					<li><strong>Applicant:  </strong><?php echo $_SESSION['username'] ?></li>
					<li><strong>Subject:  </strong><?php echo $subject ?></li>
					<li><strong>Number of Questions: </strong><?php echo $total_questions; ?></li>
					<li><strong>Type:</strong> Multiple Choice</li>
					<li><strong>Estimated Time:</strong> <?php echo $total_questions*1; ?> min</li>
				</ul><br>
				<div class="main_btn">
				       <a href="question.php?n=1" class="start" name="start">Start Quiz</a>
				</div>
			</div>
	</main>
</body>
</html>
