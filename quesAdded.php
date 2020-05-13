<html>
<head>
    <title>Add Question</title>
</head>

<body>
<?php
    if(isset($_POST['submit'])){
        $data_missing = array();

        if(empty($_POST['question'])){
            $data_missing[]='Question';
        }else{
            $ques = trim($POST['question']);
        }

        if(empty($_POST['ans1'])){
            $data_missing[]='Answer1';
        }else{
            $ans1 = trim($POST['ans1']);
            }

        if(empty($_POST['ans2'])){
           $data_missing[]='Answer2';
        }else{
            $ans2 = trim($POST['ans2']);
        }

        if(empty($_POST['ans3'])){
            $data_missing[]='Answer3';
        }else{
            $ans3 = trim($POST['ans3']);
        }

        if(empty($_POST['ans4'])){
            $data_missing[]='Answer4';
        }else{
            $ans4 = trim($POST['ans4']);
        }

        if(empty($data_missing)){
            require_once('mysqli_connect.php');

            $query = "INSERT INTO questions (question) VALUES(?) AND 
            INSERT INTO answers (ans1,ans2, ans3, ans4) VALUES(?,?,?,?)";

            $stmt = mysqli_prepare($dbc, $query);

            //i Integer
            //d Doubles
            //b blobs
            //s Everything Else

            mysqli_stmt_bind_param($stmt, "sssss", $ques, $ans1, $ans2, $ans3, $ans4 );

            mysqli_stmt_execute($stmt);

            $affected_rows = mysqli_stmt_affected_rows($stmt);
            if($affected_rows == 5){
                    echo 'Question Entered';

                    mysqli_stmt_close($stmt);
                    mysqli_close($dbc);
            }else{
                echo 'Error Occurred<br />';
                echo mysqli_error();

                    mysqli_stmt_close($stmt);
                    mysqli_close($dbc);
            }
        }else{
            echo 'You need to enter the following data<br />';
            foreach($data_missing as $missing){
                echo "$missing<br />";
            }
        }
    }
?>

<form action="quesAdded.php" method="post">

<label>Question</label>
<input type="text" name="question" size="250" value="">
<br><br>

<label>Answer 1</label>
<input type="text" name="ans1" size="250" value="">
<br>
<label>Answer 2</label>
<input type="text" name="ans2" size="250" value="">
<br>
<label>Answer 3</label>
<input type="text" name="ans3" size="250" value="">
<br>
<label>Answer 4</label>
<input type="text" name="ans4" size="250" value="">



<button type="submit" name="submit" value="Submit">Submit</button>

</form>

</body>
</html>