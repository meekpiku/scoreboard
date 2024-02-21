<?php 
                
                if(isset($_POST["submit"])){
                   $LastName=$_POST["LastName"];
                   $FirstName=$_POST["FirstName"];
                   $email=$_POST["Email"];
                   $password=$_POST["password"];
                   $RepeatPassword=$_POST["repeat-password"];
   
                   $passwordHash= password_hash($password, PASSWORD_DEFAULT);
                   $errors=array();
         
                   if(empty($LastName) OR empty($FirstName) OR empty($email) OR empty($password) OR empty($RepeatPassword)){
                           array_push($errors,"All fields are required");
                   }
                   if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                           array_push($errors,"Email is not valid");
                   }
                   if(strlen($password)<2){
                           array_push($errors, "Password must at least be 2 characters");
                   }
                   if($password!=$RepeatPassword){
                           array_push($errors, "Password does not match");
                   }
                   require_once "dbcon.php";
                   $sql = "SELECT * FROM accounts_tbl where email = '$email'";
                   $result = mysqli_query($conn, $sql);
                   $rowCount = mysqli_num_rows($result);
                   if ($rowCount >0 ){
                           array_push($errors, "Email already created");
                   }
   
                   if(count($errors)>0){
                           foreach($errors as $error){
                                   echo"<div class='alert alert-danger'>$error</div>";
                           } 
                   
                   } else {
                           
                           $sql = "INSERT INTO accounts_tbl (LAST_NAME, FIRST_NAME, EMAIL, PASSWORD) VALUES (?,?,?,?)";
                           
                            $stmt = mysqli_stmt_init($conn); // initializes a statement and returns an object suitable for mysqli_stmt_prepare() $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                            $preparestmt=mysqli_stmt_prepare($stmt, $sql);
                            if ($preparestmt){
                           mysqli_stmt_bind_param($stmt, "ssss", $LastName, $FirstName, $email, $passwordHash); 
                           mysqli_stmt_execute($stmt);
                           echo "<div class = 'alert alert-success'> You are Registered Successfully! </div>"; } else {
                                   die("Something went wrong");
                           }      
   
                   }
                }
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">

        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="LastName" placeholder="Last Name: ">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="FirstName" placeholder="First Name: ">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="Email" placeholder="Email: ">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password: ">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="repeat-password" placeholder="Repeat Password: ">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary key" name="submit" placeholder="Submit ">
            </div>

            <div><p> Already Have an Account? <a href="login.php"> Login Here</a></div>
        </form>
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

</body>
 
</html>