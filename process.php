<?php include 'db.php'; ?>
<?php session_start(); ?>
<?php 
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}
	if($_POST){
		$query = "SELECT * FROM question_table";
		$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		$next = $number+1;
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
			$insert_db = "INSERT INTO `result`(username,score,is_submit) VALUES ('$name','$score','1')";
			$i_query =  $connection->query($insert_db);
			$update_user = "UPDATE `user` SET active_user = '0' WHERE name = '$name'";
            $logout_user = $connection->query($query);
		}else{
			header("LOCATION: question.php?n=". $next);
		}
	}
?>