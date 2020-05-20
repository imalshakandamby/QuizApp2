<?php
session_start();

// initializing variables
$question = "";
$answer1    = "";
$answer2    = "";
$answer3    = "";
$answer4    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['add_ques'])) {
  // receive all input values from the form
  $question = mysqli_real_escape_string($db, $_POST['question']);
  $answer1 = mysqli_real_escape_string($db, $_POST['answer1']);
  $answer2 = mysqli_real_escape_string($db, $_POST['answer2']);
  $answer3 = mysqli_real_escape_string($db, $_POST['answer3']);
  $answer4 = mysqli_real_escape_string($db, $_POST['answer4']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($question)) { array_push($errors, "Question is required"); }
  if (empty($answer1)) { array_push($errors, "Answer1 is required"); }
  if (empty($answer2)) { array_push($errors, "Answer2 is required"); }
  if (empty($answer3)) { array_push($errors, "Answer3 is required"); }
  if (empty($answer4)) { array_push($errors, "Answer4 is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $ques_check_query = "SELECT * FROM questions WHERE question='$question' LIMIT 1";
  $result = mysqli_query($db, $ques_check_query);
  $ques = mysqli_fetch_assoc($result);
  
  if ($ques) { // if user exists
    if ($ques['question'] === $question) {
      array_push($errors, "Question already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	  	$query1 = "INSERT INTO questions (question) 
                VALUES('$question')";
        $query2 = "INSERT INTO answers (answer) 
  			    VALUES('$answer1', '$answer2', '$answer3', '$answer4')";
  	mysqli_query($db, $query1, $query2);
  	$_SESSION['question'] = $question;
  	$_SESSION['success'] = "Question entered";
  	header('location: quesAdded.php');
  }
}
?>