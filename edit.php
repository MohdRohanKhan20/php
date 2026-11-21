<?php

require_once "db.php";

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM students WHERE id = :id");
$stmt->execute([':id' => $id]);

$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    die("Student not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students
            SET name = :name,
                email = :email,
                course = :course
            WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':course' => $course,
        ':id' => $id
    ]);

    header("Location: index.php");
    exit();

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="container mt-5">

    <h2>Edit Student</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name"
                   value="<?= htmlspecialchars($student['name']) ?>"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email"
                   value="<?= htmlspecialchars($student['email']) ?>"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Course</label>
            <input type="text" name="course"
                   value="<?= htmlspecialchars($student['course']) ?>"
                   class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Update Student
        </button>

        <a href="index.php" class="btn btn-secondary">Back</a>

    </form>

</body>
</html>