<?php include 'db.php';?>
<?php session_start();?>
<?php
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}
	$subject = $_GET['id'];
    $get_total_sub = base64_decode($_GET['totalq']);
	if($_POST){
		$get_subject = $_GET['subject'];
        // $chosen_q = base64_decode($_GET['q_chosen']);
		// $query = "SELECT * FROM question_table WHERE quiz_id = $subject";
		// $total_questions = mysqli_num_rows(mysqli_query($connection,$query));
		$q_number = $_POST['question_number'];
		$q_sequence_number = $_POST['q_sequence_number'];
		$total_question = $_POST['total_question'];
		$selected_choice = $_POST['choice']; 
		// $next = $number+1;
		$query = "SELECT * FROM answers_table WHERE question_number = $q_number AND is_correct = 1";
		$result = mysqli_query($connection,$query);
		$row = mysqli_fetch_assoc($result);
		$correct_choice = $row['answer_id'];
		if($selected_choice == $correct_choice){
			$_SESSION['score']++;
		}
        $name = $_SESSION['username'];

		// $stop_resubmission = "SELECT * FROM `marks` WHERE username = $name AND question = $q_number";
		// $check_exist = $connection->query($stop_resubmission);
		// $if_ans_exist = mysqli_num_rows($check_exist);
		// if($if_ans_exist > 0){
		// 	die();
		// } 

		$i_marks = "INSERT INTO `marks`(username,question,option_chosen) VALUES ('$name','$q_number','$selected_choice')";
		$connection->query($i_marks);
		
		
        
		if($q_sequence_number == $total_question){
			$name = $_SESSION['username'];
			$score = $_SESSION['score'];
			$insert_db = "INSERT INTO `result`(username,subject,total_questions,score,is_submit) VALUES ('$name','$get_subject','$get_total_sub','$score','1')";
			$i_query =  $connection->query($insert_db);
			
			$query = "UPDATE user SET active_user = '0' WHERE name = '$name'";
			$connectQ = $connection->query($query); 
			header("LOCATION: final.php");
		}else{
			$sequence = $q_sequence_number+1;
			header("LOCATION: question.php?n=$q_number&sequence=$sequence&id=$subject&subject=$get_subject&totalq=$get_total_sub");
		}
	}
?>