<?php
    require_once('../mysqli_connect.php');
    $query = "SELECT question, ans1,ans2,ans3,ans4, FROM questions, answers";
    $response = @mysqli_query($dbc, $query);

    if($response){
        echo '<table align="left" cellspacing="5" cellpadding="8">
        
        <tr><td align="left"><b>Question: </b></tr><br>
        <tr><td align="left">A: </td></tr>
        <tr><td align="left">B: </td></tr>
        <tr><td align="left">C: </td></tr>
        <tr><td align="left">D: </td></tr>
        ';

        while($row = mysqli_fetch_array($response)){
            echo '<tr><td align="left"></tr>' .
            $row['question'] . '</td><tr><td align="left">' .
            $row['ans1'] . '</td></tr><tr><td align="left">' .
            $row['ans2'] . '</td></tr><tr><td align="left">' .
            $row['ans3'] . '</td></tr><tr><td align="left">' .
            $row['ans4'] . '</td></tr><tr><td align="left">'    ;
        }
        echo '</table>';
    }else{
        echo "Couldn't issue database query";
        echo mysqli_error($dbc);
    }
    mysqli_close($dbc);
?>