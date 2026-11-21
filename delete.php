<?php

require_once "db.php";

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {

    $id = (int) $_GET['id'];

    $stmt = $conn->prepare(
        "DELETE FROM students WHERE id = :id"
    );

    $stmt->execute([':id' => $id]);

}

header("Location: index.php");
exit();

?>