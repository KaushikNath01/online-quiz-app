<?php  include 'db.php';
session_start();
if(!isset($_SESSION['adminloggedIn']) || $_SESSION['adminloggedIn'] != true){
	Header("Location: adminlogin.php");
}
if(isset($_POST['submit'])){
	$question_number = $_POST['question_number'];
	$question_text = $_POST['question_text'];
	$correct_choice = $_POST['correct_choice'];

	$choice = array();
	$choice[1] = $_POST['choice1'];
	$choice[2] = $_POST['choice2'];
	$choice[3] = $_POST['choice3'];
	$choice[4] = $_POST['choice4'];
	$choice[5] = $_POST['choice5'];


	$query = "INSERT INTO question_table (";
	$query .= "question_number, quiz_id ,question_text )";
	$query .= "VALUES (";
	$query .= " '{$question_number}','{$subjects}','{$question_text}' ";
	$query .= ")";

	$result = mysqli_query($connection,$query);
	
	if($result){
		foreach($choice as $option => $value){
			if($value != ""){
				if($correct_choice == $option){
					$is_correct = 1;
				}else{
					$is_correct = 0;
				}
			
				$query = "INSERT INTO answers_table (";
				$query .= "question_number,is_correct,answers)";
				$query .= " VALUES (";
				$query .=  "'{$question_number}','{$is_correct}','{$value}' ";
				$query .= ")";

				$insert_row = mysqli_query($connection,$query);

				if($insert_row){
					continue;
				}else{
					die("2nd Query for Choices could not be executed" . $query);	
				}
			}
		}
		$message = "Question has been added successfully";
	}
}
		$query = "SELECT * FROM question_table";
		$questions = mysqli_query($connection,$query);
		$total = mysqli_num_rows($questions);
		$next = $total+1;	
?>
<html>
<head>
	<title>EduAid Quiz App</title>
	<style>
		     p{
				 display:flex;
				 justify-content:space-between;
			 }
			 label{
				 padding-right:45px;
			 }
	</style>
	<?php include './links.php'; ?>
</head>
<body>
	<main class="quiz_box add_container">
			<div class="container">
				<h2 style="text-align: center">Add A Question</h2><br>
				<?php if(isset($message)){
					echo "<h4>" . $message . "</h4>";
				} ?>
				<form method="POST" action="add.php">
							<label>Question No:</label>
							<input type="number" name="question_number" value="<?php echo $next;  ?>">
						</p><br>
						<p>
							<label>Question Text:</label>
							<input type="text" name="question_text">
						</p><br>
						<p>
							<label>Choice 1:</label>
							<input type="text" name="choice1">
						</p><br>
						<p>
							<label>Choice 2:</label>
							<input type="text" name="choice2">
						</p><br>
						<p>
							<label>Choice 3:</label>
							<input type="text" name="choice3">
						</p><br>
						<p>
							<label>Choice 4:</label>
							<input type="text" name="choice4">
						</p><br>
						<p>
							<label>Choice 5:</label>
							<input type="text" name="choice5">
						</p><br>
						<p>
							<label>Correct Option:</label>
							<input type="number" name="correct_choice">
						</p>
						<div class="add_quiz_btn">
						      <input type="submit" name="submit" value ="submit">
						</div>
				</form>
			</div>
	</main>
</body>
</html>