<?php

            if (isset($_POST["login"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];

                    require_once "dbcon.php";

                    $sql = "SELECT * FROM accounts_tbl WHERE email = '$email'";

                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    // $userNameSql = "SELECT FIRST_NAME FROM accounts_tbl WHERE email = '$email'";
                    // $userName = mysqli_query($conn,$userNameSql);
                    if ($user) {
                        if(password_verify($password, $user["password"])) {
                            session_start();
                           header("Location: index.php");
                            $_SESSION["userEmail"] = $user["email"];
                  
                            
                            die();
                    } else {
                        // echo "<div class= 'alert alert-danger'> Stored Password:" . $user["password"] . "</div>" ;
                        //     echo "<div class= 'alert alert-danger'> Input Password: " . password_hash($password, PASSWORD_DEFAULT) . "</div>";
                        echo "<div class= 'alert alert-danger'> Password does not match </div>";
                    }
            }  else {
                echo "<div class = 'alert alert-danger'> Email does not match </div>";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">

</head>
<body>
    <div class="container">

        <!-- onsubmit="return TestAccount()" -->
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" class="form-control" required>
            </div>
        
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="password" class="form-control" required>
            </div>
        
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div><p style="color: white; margin-top: 20px;"> Not Registered yet? <a href="registration.php"> Register Here</a></div>

    </div>

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

    <script>
        function TestAccount() {
            var inputEmail = document.getElementsByName("email")[0].value;
            var inputPassword = document.getElementsByName("password")[0].value;

            // Hardcoded credentials
            var hardcodedEmail = "user@gmail.com";
            var hardcodedPassword = "password";
    
            if (inputEmail === hardcodedEmail && inputPassword === hardcodedPassword) {
                // Redirect to index.html on successful login
                window.location.href = "index.html";
                return false; 
            } else {
           
                alert("Invalid credentials. Please try again.");
                return false; 
            }
        }
    </script>

    
</body>
</html>