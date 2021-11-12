<?php 
	include 'db.php';
	session_start(); 
	if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true){
		Header("Location: login.php");
    }
	$number = $_GET['n'];
	$question_selected = $_GET['id'];
	echo $question_selected;
	$get_subject = base64_decode($_GET['subject']);
	 
	$query = "SELECT * FROM question_table WHERE question_number = (select min(question_number) from question_table where quiz_id = $question_selected AND question_number > $number)";
	$result = mysqli_query($connection,$query);
	$question = mysqli_fetch_assoc($result); 
	print_r($question);
	$query = "SELECT * FROM answers_table WHERE question_number = (select min(question_number) from question_table where quiz_id = $question_selected AND question_number > $number) ORDER by RAND()"; 
	$choices = mysqli_query($connection,$query);
	$query = "SELECT * FROM question_table WHERE quiz_id = $question_selected";
	$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
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
							<div class="timer_sec" id="demo"></div>
						</div>
						<div class="time_line"></div>
                </header>
				<section>
						<div class="current">Question <?php echo $number; ?> of <?php echo $total_questions; ?> </div><br>
						<p class="que_text"><?php echo $question['question_text'];?></p><br>
						<form method="POST" action="process.php?id=<?php echo $question_selected?>&subject=<?php echo base64_encode($get_subject);?>">
									<ul class="choicess">
										<?php while($row=mysqli_fetch_assoc($choices)){ ?>
										<li style="cursor:pointer; height:42px; width:100%; border:1px solid rgb(116, 164, 235); background-color:rgb(232, 241, 255); padding-top:9px; padding-left:9px; border-radius:4px;">
											<input style="padding-left:5px;" id="chb" type="radio" name="choice" value="<?php echo $row['answer_id']; ?>">  <?php echo $row['answers']; ?>
										</li><br>
										<?php } ?>
									</ul>
									<input type="hidden" name="number" value="<?php echo $question['question_number']; ?>">
						</section>
							<footer>
									<div class="total_que">
									</div>
									<input class="submit_btn disable_btn" type="submit" name="submit" value="Submit">
							</footer>
				       </form>
			</div>
	</main>
</body>
        <script>
					const next_btn = document.querySelector("footer .submit_btn");
					function setup(time) {
						let timer = document.getElementById('demo');
						timer.innerHTML = time;
						function timeout(){
							const btn = document.querySelector('footer .submit_btn');
							time--;
							if(time < 0){
								clearInterval(setup);
                                const li = document.querySelector('.choicess');
                                const time_over = document.querySelector('.time_left_txt');
								li.classList.add('disable');
								btn.classList.remove('disable_btn');
								btn.style.cursor='pointer';
								time_over.textContent = 'time over';
						    }else{
								 timer.innerHTML = time;
							}
						}
					    setInterval(timeout,1000);
					}
					setup(10);
		</script>
</html>
      <!-- <?php
            //  if(isset($_POST['submit'])){
			// 	 $_SESSION['question_number'] = $question['question_number'];
			//  }
	  ?> -->