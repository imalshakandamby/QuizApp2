<?php include('server2.php') ?>

<?php 
  //session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Questions and answers</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Add Questions and Answers</h2>
  </div>
	
  <form method="post" action="addQues.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Question</label>
  	  <input type="text" name="question" value="<?php echo $question; ?>">
  	</div>

  	<div class="input-group">
  	  <label>Answer1</label>
  	  <input type="text" name="answer1" value="<?php echo $answer1; ?>">
  	</div>

  	<div class="input-group">
  	  <label>Answer2</label>
  	  <input type="text" name="answer2" value="<?php echo $answer2; ?>">
  	</div>

    <div class="input-group">
  	  <label>Answer3</label>
  	  <input type="text" name="answer3" value="<?php echo $answer3; ?>">
  	</div>

    <div class="input-group">
  	  <label>Answer4</label>
  	  <input type="text" name="answer4" value="<?php echo $answer4; ?>">
  	</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_ques">ADD</button>
  	</div>
  </form>

  <?php  if (isset($_SESSION['username'])) : ?>
    	<p> <a href="addQues.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>

</body>
</html>
