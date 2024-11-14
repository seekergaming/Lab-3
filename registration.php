<html>
    <head>
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body class="bg-white d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="card p-4 shadow-sm p-3 mb-5 bg-white rounded" style="width: 300px;">
        <div class="text-center mb-3">
        <h2>Register</h2>
        </div>
        <form action="registration.php" method="POST">
            <div class="mb-2">
            <label for="name" class="form-label">Username: </label>
            <input type="text" id="username" name="username" class="form-control"><br>
            </div>
            <div class="mb-2">
            <label for="password" class="form-label">Password: </label>
            <input type="password" id="password" name="password" class="form-control"><br>
            </div>
            <div class="text-center d-grid">
            <input type="submit" value="Register" class="btn btn-primary">
            </div>
        </form>

        <div class="text-center">
        <a href="login.php">Already have an account? Login here</a>
        </div>
        </div>
        
    </body>
</html>

<?php
include "db_conn.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users_reg (username, password) VALUES ('$username', '$password')";

    if(mysqli_query($conn, $sql)){
        // echo "New record created successfully";
    }else{
        echo "Error: ". $sql . "<br>" . mysqli_error($conn);
    }
}

?>