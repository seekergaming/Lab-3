<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-white d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="card p-4 shadow-sm p-3 mb-5 bg-white rounded" style="width: 300px;">
        <div class="text-center mb-3">
            <h2>Login</h2>
        </div>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="d-grid">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </form>
        <div class="text-center mt-3">
            <a href="registration.php">Don't have an account? Register here</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


<?php
session_start(); 
include "db_conn.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){ 
    $username = mysqli_real_escape_string($conn, $_POST['username']); 
    $password = $_POST['password'];

    $sql = "SELECT * FROM users_reg WHERE username='$username'"; 
    $result = mysqli_query($conn, $sql); 
    
    if(mysqli_num_rows($result) == 1){ 
        while($row = mysqli_fetch_assoc($result)){ 
            if(password_verify($password, $row["password"])){ 
                $_SESSION['username']=$username; 
                header("Location: view.php"); 
            }else{
                echo "Invalid username or password";
            }
        }
    }else{ //if the user doesnt exists
        echo "No user found with that username";
    }
}
?>



