<?php include 'db.php'; ?>
<?php session_start(); ?>
<?php 
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}
	$subject = $_GET['id'];

	if($_POST){
		$get_subject = base64_decode($_GET['subject']);
        
		$query = "SELECT * FROM question_table WHERE quiz_id = $subject";
		$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
		$number = $_POST['number'];
		$selected_choice = $_POST['choice']; 
		$next = $number;
		$query = "SELECT * FROM answers_table WHERE question_number = $number AND is_correct = 1";
		$result = mysqli_query($connection,$query);
		$row = mysqli_fetch_assoc($result);
		$correct_choice = $row['answer_id'];
		if($selected_choice == $correct_choice){
			$_SESSION['score']++;
		}
		if($number == $total_questions){
			header("LOCATION: final.php");
			$name = $_SESSION['username'];
			$score = $_SESSION['score'];
			$insert_db = "INSERT INTO `result`(username,subject,score,is_submit) VALUES ('$name','$get_subject','$score','1')";
			$i_query =  $connection->query($insert_db);
			
			// $answer_selected = $_POST['choice'];
			// $insert_marks = "INSERT INTO `marks`(username, subject, question, option_chosen) VALUES ('$name','$get_subject','$subject','$_SESSION['question_number']','$answer_selected')"

		}else{
			header("LOCATION: question.php?n=$next&id=$subject&subject=$get_subject");
		}
	}
?>