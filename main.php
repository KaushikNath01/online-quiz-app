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
	<?php include './links.php'; ?>
</head>
<body?>
	<main class="quiz_box main_container" style="width:600px; height:400px; background-color:white;">
			<div class="main_wrapper">
				<h2>Test Your EduAidTest Knowledge</h2><br>
				<p>
					This is a multiple choise quiz to test your Knowledge.
				</p><br>
				<ul>
					<li><strong>Applicant:  </strong><?php echo $_SESSION['username'] ?></li>
					<li><strong>Number of Questions: </strong><?php echo $total_questions; ?></li>
					<li><strong>Type:</strong> Multiple Choice</li>
					<li><strong>Estimated Time:</strong> <?php echo $total_questions*1; ?> min</li>
				</ul><br>
				<div class="main_btn">
				       <a href="question.php?n=1" class="start">Start Quiz</a>
				</div>
			</div>
	</main>
</body>
</html>