<?php
require_once "db.php";

$stmt = $conn->query("SELECT * FROM students ORDER BY id DESC");

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="container mt-5">

    <h2>Student Management System</h2>

    <a href="create.php" class="btn btn-primary mb-3">
        Add Student
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($students as $student): ?>

                <tr>
                    <td><?= $student['id'] ?></td>

                    <td><?= htmlspecialchars($student['name']) ?></td>

                    <td><?= htmlspecialchars($student['email']) ?></td>

                    <td><?= htmlspecialchars($student['course']) ?></td>

                    <td>
                        <a href="edit.php?id=<?= $student['id'] ?>"
                           class="btn btn-warning">Edit</a>

                        <a href="delete.php?id=<?= $student['id'] ?>"
                           class="btn btn-danger"
                           onclick="return confirm('Are you sure?')">
                            Delete
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</body>
</html>