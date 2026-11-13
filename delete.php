<?php
include 'db.php';

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $sql = $conn->prepare("DELETE FROM results WHERE result_id = $id");

    if ($sql->execute()) {
        header("Location: index.php");
    }

}

?>