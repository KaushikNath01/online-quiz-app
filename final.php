<?php 
	session_start();
	if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true){
		Header("Location: login.php");
	}
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
				<p><span style="font-size:20px;">Congratulation</span> <span style="font-size:23px; color: #004085; font-weight:bolder;"><?php echo $_SESSION['username'] ?></span> <br> You have completed this test succesfully.</p><br>
				<p>Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?></p>
				   <?php 
				        unset($_SESSION['username']);
				        unset($_SESSION['score']);
						session_destroy();
				   ?>
			</div>
	</main>
</body>
</html>