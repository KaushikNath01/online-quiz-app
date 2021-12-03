<?php 
	include 'db.php';
	session_start(); 
	if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true){
		Header("Location: login.php");
    }
	$number = $_GET['n'];
	$question_selected = $_GET['id'];
	$sequence = 0 ;
	if(isset($_GET['sequence'])){
		$sequence = $_GET['sequence'];
	};
	// echo $question_selected;
	$get_subject = base64_decode($_GET['subject']);?><br><?php
    echo $get_subject;?><br><?php
	$get_total_sub = base64_decode($_GET['totalq']);
	$_SESSION['timer'] = $get_total_sub;
	$_session['subject'] = $question_selected;
	 
	// $query = "SELECT * FROM question_table WHERE question_number = (select min(question_number) from question_table where quiz_id = $question_selected AND question_number > $number)";
	// $result = mysqli_query($connection,$query);
	// $question = mysqli_fetch_assoc($result); 
	
	// $query = "SELECT * FROM answers_table WHERE question_number = (select min(question_number) from question_table where quiz_id = $question_selected AND question_number > $number) ORDER by RAND()"; 
	// $choices = mysqli_query($connection,$query);
    
    $seq = 0;
	$query = "SELECT DISTINCT @seq := FLOOR(@seq + 1) AS sequence, yt.*
	          FROM (SELECT @seq := $sequence ) s, question_table yt WHERE 
			  question_number = (select min(question_number) from question_table where quiz_id = $question_selected AND question_number > $number)
			  ORDER by RAND()";
    $now = $connection->query($query);
	$question = mysqli_fetch_assoc($now); 
	print_r($question);?><br><?php
	
	$query = "SELECT * FROM question_table WHERE quiz_id = $question_selected";
	$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
    
	$seq = 0;
	$question_number1 = $question['question_number']; 
	// $query = "SELECT DISTINCT @seq := FLOOR(@seq + 1) AS sequence, yt.*
	        //   FROM (SELECT @seq := 0) s, answers_table yt WHERE question_number = (select min(question_number) from question_table where quiz_id = $question_selected AND question_number > $number) ORDER by RAND()";
$query = "SELECT * FROM `answers_table` WHERE `question_number` = $question_number1  ORDER BY RAND() ";

			$choices = $connection->query($query);
	print_r($choices);
    	
?>
<html>
<head>
	<title>PHP Quizer</title>
	<?php include './links.php';?>
</head>
<body>
	<?php include 'logoutBtn.php'; ?>
	<main>
			<div class="quiz_box">
				<header>
						<div class="title">EduAid Test App</div>
						<div class="timer">
							<div class="time_left_txt">Time Left</div>
							<div class="timer_sec" id="demo" style="color:white;"></div>
						</div>
						<div class="time_line"></div>
                </header>
				<section>
						<div class="current">Question <?php echo $number; ?> of <?php echo $total_questions; ?> </div><br>
						<p class="que_text"><?php echo $question['question_text'];?></p><br>
						<form method="POST" action="process.php?id=<?php echo $question_selected;?>&subject=<?php echo base64_encode($get_subject);?>&totalq=<?php base64_encode($get_total_sub)?>">
									<ul class="choicess">
										<?php while($row=mysqli_fetch_assoc($choices)){ ?>
										<li style="cursor:pointer; height:42px; width:100%; border:1px solid rgb(116, 164, 235); background-color:rgb(232, 241, 255); padding-top:9px; padding-left:9px; border-radius:4px;">
											<input style="padding-left:5px;" id="chb" type="radio" name="choice" value="<?php echo $row['answers']; ?>">  <?php echo $row['answers']; ?>
										</li><br>
										<?php } ?>
									</ul>
									<input type="hidden" name="question_number" value="<?php echo $question['question_number']; ?>">
									<input type="hidden" name="q_sequence_number" value="<?php echo $question['sequence']; ?>">
									<input type="hidden" name="total_question" value="<?php echo $total_questions; ?>">
						</section>
							<footer>
									<div class="total_que">
									</div>
									<input style="cursor:pointer;" class="submit_btn" type="submit" name="submit" value="Submit">
							</footer>
				       </form>
			</div>
	</main>
</body>
		<script>
			    //   $(document).ready(function(){
                //        setInterval(() => {
				// 		   $('#demo').load('timer.php');
				// 	   }, 1000);
				//   });
				let time = 60;
				let timeStatus = document.querySelector('.time_left_txt');
				let timeS = document.querySelector('.timer_sec');
				var myVar = setInterval(myTimer, 1000);
				function myTimer() {
					let timeStart = document.getElementById("demo").innerHTML = time--;
					if(timeStart <= 10){
						timeS.style.color = "red";
						timeS.style.background = "white";
					}
					if(timeStart <= 0){
						timeStatus.style.color = "red";
                        timeStatus.innerHTML = 'Time Out';
						myStopFunction();
					}
				}
				function myStopFunction() {
				      clearInterval(myVar);
				}
		</script> 
</html>