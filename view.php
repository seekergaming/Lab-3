<?php
session_start();
?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Users List</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="view.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="update.php" tabindex="-1" aria-disabled="true">Update</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
            
    <div class="container mt-4">
        <h2 class="border-bottom pb-2 mb-4">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
        
        <table class="table table-bordered table-hover text-center">
            <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Birth Date</th>
                    <th>Study Program</th>
                    <th>Study Year</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            <?php
            include "db_conn.php";

            $sql = "SELECT * FROM students";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>". $row["id"] ."</td>";
                    echo "<td>". $row["full_name"] ."</td>";
                    echo "<td>". $row["student_id"] ."</td>";
                    echo "<td>". $row["email"] ."</td>";
                    echo "<td>". $row["phone"] ."</td>";
                    echo "<td>". $row["gender"] ."</td>";
                    echo "<td>". $row["date_of_birth"] ."</td>";
                    echo "<td>". $row["program_of_study"] ."</td>";
                    echo "<td>". $row["year_of_study"] ."</td>";
                    echo "<td><a href='update.php?id=". $row['id']."' class='btn btn-primary btn-sm'>Edit</a></td>";
                    echo "<td><a href='delete.php?id=". $row['id']."' class='btn btn-danger btn-sm'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11' class='text-center'>No Data Found</td></tr>";
            }
            ?>
            </tbody>
        </table>

        <a href="register.php" class="btn btn-secondary">Register User</a>
    </div>

</body>
</html>
