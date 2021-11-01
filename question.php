<?php 
	include 'db.php';
	session_start(); 
	if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true){
		Header("Location: login.php");
    }
	// if ($_SESSION['testcomplete'] == 'yes') {
	// 	header("Location: login.php");
	// }
	// $number = $_GET['n'];
	// $quizid = base64_decode($_GET['quizid']);
	
	// $query = "SELECT * FROM question_table WHERE question_number = (select min(question_number) from question_table where quiz_id = $quizid AND question_number > $number )  ";

	// $result = $connection->query($query);
	// $question = mysqli_fetch_assoc($result); 
     
	// $query = "SELECT * FROM answers_table WHERE question_number = (select min(question_number) from question_table where quiz_id = $quizid AND question_number > $number ) ORDER by RAND()";
	// $choices = mysqli_query($connection,$query);
	// $query = "SELECT * FROM question_table";
	// $total_questions = mysqli_num_rows($connection->query($query));
	$number = $_GET['n'];
	$query = "SELECT * FROM question_table WHERE question_number = $number";
	$result = mysqli_query($connection,$query);
	$question = mysqli_fetch_assoc($result); 
	$query = "SELECT * FROM answers_table WHERE question_number = $number ORDER by RAND()";
	$choices = mysqli_query($connection,$query);
	$query = "SELECT * FROM question_table";
	$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
?>
<html>
<head>
	<title>PHP Quizer</title>
	<?php include './links.php';?>
</head>
<body>
	<main>
			<div class="quiz_box">
				<header>
						<div class="title">EduAid Test App</div>
						<div class="timer">
							<div class="time_left_txt">Time Left</div>
							<div class="timer_sec">
								   <div id="seconds"></div>  
							</div>
						</div>
						<div class="time_line"></div>
                </header>
				<section>
						<div class="current">Question <?php echo $number; ?> of <?php echo $total_questions; ?> </div><br>
						<p class="que_text"><?php echo $question['question_text']; ?> </p><br>
						<form method="POST" action="process.php">
							<ul class="choicess">
								<?php while($row=mysqli_fetch_assoc($choices)){ ?>
								<li style="cursor:pointer; height:42px; width:100%; border:1px solid rgb(116, 164, 235); background-color:rgb(232, 241, 255); padding-top:9px; padding-left:9px; border-radius:4px;">
									<input style="padding-left:5px;" id="chb" type="radio" name="choice" value="<?php echo $row['answer_id']; ?>">  <?php echo $row['answers']; ?>
								</li><br>
								<?php } ?>
							</ul>
							<input type="hidden" name="number" value="<?php echo $number; ?>">
				</section>
					 <footer>
							<div class="total_que">
							</div>
							<input class="submit_btn" type="submit" name="submit" value="Submit">
                     </footer>
				</form>
			</div>
	</main>
</body>
</html>