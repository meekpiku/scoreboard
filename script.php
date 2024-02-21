<?php
    
    $matchDate="";
    $difficulty="";
    $matchResult="";
    if(isset($_POST)){
        $data = file_get_contents("php://input");
        $user = json_decode($data, true);
session_start();
        // echo json_encode($user);
        $matchDate=$user["Match date"];
        $difficulty=$user["Difficulty"];
        $matchResult=$user["Match Result"];
        $playerEmail = $_SESSION["userEmail"];
        echo $_SESSION["user"] ."\r\n";
        echo $matchDate ."\r\n";
        echo $difficulty ."\r\n";
        echo $matchResult ."\r\n";
    }
    
    require_once "dbcon.php";

    $connect = mysqli_connect($hostName, $user, $catliPassword, $dbName);
    $query = "INSERT INTO scoreboard_tbl (MATCH_DATE, AI_DIFF, MATCH_RESULT, email) VALUES ('$matchDate', '$difficulty', '$matchResult', '$playerEmail')";
    $result = mysqli_query($connect, $query);

    if($result){
        echo "Data successfully inserted";
    }else{
        echo "Failed insertion";
    }

    mysqli_close($connect);
?>