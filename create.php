<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, course)
            VALUES (:name, :email, :course)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':course' => $course
    ]);

    header("Location: index.php");
    exit();

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="container mt-5">

    <h2>Add Student</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Course</label>
            <input type="text" name="course" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">
            Save Student
        </button>

        <a href="index.php" class="btn btn-secondary">Back</a>

    </form>

</body>
</html>