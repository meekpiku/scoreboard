<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Results Table</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<button class="back-button" onclick="location.href='index.php'">← </button>
    <h1 class="scoreboard">SCOREBOARD</h1>

    <table class="game-table">

        <thead>
      
            <tr>
                <th>USER</th>
                <th>MATCH DATE</th>
                <th>AI DIFFICULTY</th>
                <th>MATCH RESULT</th>
            </tr>
        </thead>
        <tbody>
<?php
        //fix name logic?
        require_once "dbcon.php";

        $connect = mysqli_connect($hostName, $user, $catliPassword, $dbName);
        $query = "SELECT * FROM scoreboard_tbl";
        $result  = mysqli_query($connect, $query);

        while($temp= mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<th>" . $temp["email"] . "</th>";
            echo "<th>" . $temp["MATCH_DATE"] . "</th>";
            echo "<th>" . $temp["AI_DIFF"] . "</th>";
            echo "<th>" . $temp["MATCH_RESULT"] . "</th>";
            echo "</tr>";
        }
?>
            <!-- <tr>
                <td>Gabriel Amor</td>
                <td>16/02/2024</td>
                <td>Expert AI</td>
                <td>Win</td>
            </tr>
            <tr>
                <td>Richard Espaldon</td>
                <td>16/02/2024</td>
                <td>Easy AI</td>
                <td>Lose</td>
            </tr>
            <tr>
                <td>Gabriel Amor</td>
                <td>16/02/2024</td>
                <td>Expert AI</td>
                <td>Win</td>
            </tr>
            <tr>
                <td>Richard Espaldon</td>
                <td>16/02/2024</td>
                <td>Easy AI</td>
                <td>Lose</td>
            </tr>
            <tr>
                <td>Gabriel Amor</td>
                <td>16/02/2024</td>
                <td>Expert AI</td>
                <td>Win</td>
            </tr>
            <tr>
                <td>Richard Espaldon</td>
                <td>16/02/2024</td>
                <td>Easy AI</td>
                <td>Lose</td>
            </tr>
            <tr>
                <td>Gabriel Amor</td>
                <td>16/02/2024</td>
                <td>Expert AI</td>
                <td>Win</td>
            </tr>
            <tr>
                <td>Richard Espaldon</td>
                <td>16/02/2024</td>
                <td>Easy AI</td>
                <td>Lose</td>
            </tr>
            <tr>
                <td>Gabriel Amor</td>
                <td>16/02/2024</td>
                <td>Expert AI</td>
                <td>Win</td>
            </tr>
            <tr>
                <td>Richard Espaldon</td>
                <td>16/02/2024</td>
                <td>Easy AI</td>
                <td>Lose</td>
            </tr> -->
        </tbody>
    </table>

    <div class="wrapper">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

</body>
</html>
