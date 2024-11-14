<html>
<head>
    <title>Add Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container mt-5">

    <h2 class="border-bottom pb-2 mb-4">Student Registration Form</h2>
    <form action="register.php" method="POST" class="p-4 bg-white rounded shadow-sm">

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="full_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID:</label>
            <input type="text" id="student_id" name="student_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number:</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gender:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="Male" id="male" required>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="Female" id="female" required>
                <label class="form-check-label" for="female">Female</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="Other" id="other" required>
                <label class="form-check-label" for="other">Other</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="birth_date" class="form-label">Birth Date:</label>
            <input type="date" id="birth_date" name="date_of_birth" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="program" class="form-label">Program of Study:</label>
            <select id="program" name="program_of_study" class="form-select">
                <option value="Data engineering">Data Engineering</option>
                <option value="Software engineering">Software Engineering</option>
                <option value="Network and Security">Network and Security</option>
                <option value="Bioinformatics">Bioinformatics</option>
                <option value="Graphics and Multimedia Software">Graphics and Multimedia Software</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year of Study:</label>
            <select id="year" name="year_of_study" class="form-select">
                <option value="1">Year 1</option>
                <option value="2">Year 2</option>
                <option value="3">Year 3</option>
                <option value="4">Year 4</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="mt-4">
        <a href="view.php" class="btn btn-secondary">View List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

<?php
include "db_conn.php"; // Connecting to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $studentid = $_POST['student_id'];
    $phone_number = $_POST['phone'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['date_of_birth'];
    $program = $_POST['program_of_study'];
    $year = $_POST['year_of_study'];

    $sql = $conn->prepare("INSERT INTO students (full_name, student_id, email, phone, gender, date_of_birth, program_of_study, year_of_study) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssssssss", $name, $studentid, $email, $phone_number, $gender, $birth_date, $program, $year);

    if ($sql->execute()) {
        // Redirect or show success message
    } else {
        echo "Error: " . $sql->error;
    }
}
?>
