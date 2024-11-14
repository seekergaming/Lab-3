<html>
<head>
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container mt-5">

    <h2 class="border-bottom pb-2 mb-4">Update User</h2>
    <?php

    include "db_conn.php";

    if (isset($_GET["id"])) { // Check if id parameter is available in the URL
        $id = $_GET["id"]; // Get the id parameter value
        $sql = "SELECT * FROM students WHERE id=$id"; // SQL query to select user data based on id
        $result = mysqli_query($conn, $sql); // Fetch the result set into an associative array
        $row = mysqli_fetch_assoc($result);
    }
    ?>

    <form action="update.php?id=<?php echo $row['id']; ?>" method="POST" class="p-4 bg-white rounded shadow-sm">

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="full_name" value="<?php echo $row['full_name']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID:</label>
            <input type="text" id="student_id" name="student_id" value="<?php echo $row['student_id']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gender:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="Male" id="male" <?php if ($row['gender'] == 'Male') echo 'checked'; ?> required>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="Female" id="female" <?php if ($row['gender'] == 'Female') echo 'checked'; ?> required>
                <label class="form-check-label" for="female">Female</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="Other" id="other" <?php if ($row['gender'] == 'Other') echo 'checked'; ?> required>
                <label class="form-check-label" for="other">Other</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Birth Date:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="program" class="form-label">Study Program:</label>
            <select id="program" name="program_of_study" class="form-select">
                <option value="Database Engineering" <?php if ($row['program_of_study'] == 'Database Engineering') echo 'selected'; ?>>Database Engineering</option>
                <option value="Software Engineering" <?php if ($row['program_of_study'] == 'Software Engineering') echo 'selected'; ?>>Software Engineering</option>
                <option value="Network and Security" <?php if ($row['program_of_study'] == 'Network and Security') echo 'selected'; ?>>Network and Security</option>
                <option value="Bioinformatics" <?php if ($row['program_of_study'] == 'Bioinformatics') echo 'selected'; ?>>Bioinformatics</option>
                <option value="Graphics and Multimedia Software" <?php if ($row['program_of_study'] == 'Graphics and Multimedia Software') echo 'selected'; ?>>Graphics and Multimedia Software</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year of Study:</label>
            <select id="year" name="year_of_study" class="form-select">
                <option value="1" <?php if ($row['year_of_study'] == 1) echo 'selected'; ?>>Year 1</option>
                <option value="2" <?php if ($row['year_of_study'] == 2) echo 'selected'; ?>>Year 2</option>
                <option value="3" <?php if ($row['year_of_study'] == 3) echo 'selected'; ?>>Year 3</option>
                <option value="4" <?php if ($row['year_of_study'] == 4) echo 'selected'; ?>>Year 4</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST['full_name'];
        $studentid = $_POST['student_id'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone'];
        $gender = $_POST['gender'];
        $birth_date = $_POST['date_of_birth'];
        $program = $_POST['program_of_study'];
        $year = $_POST['year_of_study'];

        $sql = $conn->prepare("UPDATE students SET full_name=?, student_id=?, email=?, phone=?, gender=?, date_of_birth=?, program_of_study=?, year_of_study=? WHERE id=?");
        $sql->bind_param("ssssssssi", $name, $studentid, $email, $phone_number, $gender, $birth_date, $program, $year, $id);

        if ($sql->execute()) {
            echo "<div class='alert alert-success mt-3'>Record updated successfully</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error: " . $sql->error . "</div>";
        }
    }
    ?>

    <div class="mt-4">
        <a href="view.php" class="btn btn-secondary">View List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
