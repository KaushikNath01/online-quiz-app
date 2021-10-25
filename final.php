<?php 
	session_start();
	if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true){
		Header("Location: login.php");
	}
	// $_SESSION['testcomplete'] = 'yes';
?>
<html>
<head>
	<title>EduAid Quiz App</title>
	<?php include './links.php'; ?>
</head>
<body>
	<main class="quiz_box final_container">
			<div class="final_wrapper">
				<h2 style="text-align: center">Your Result</h2><br>
				<p>Congratulation <?php echo $_SESSION['username'] ?> You have completed this test succesfully.</p><br>
				<p>Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?></p>
				   <?php 
				        unset($_SESSION['username']);
				        unset($_SESSION['score']);
				   ?>
			</div>
	</main>
</body>
</html>