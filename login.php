<?php
session_start();

include "db.php";


if (isset($_POST['login'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];

    if ($username == "" || $password == "") {
        $error = "Please fill in all fields.";
    } else {

        $sql = $conn->prepare("SELECT * FROM users WHERE name = '$username'");

        $sql -> execute();

        $user = $sql->get_result()->fetch_assoc();

        if($user && password_verify($password,$user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid username or password.";

        }
    }
}

?>

<h2>STUDENT GRADING</h2>

<H3>LOGIN</H3>

<form method = "post">
    <label for="name">Name:</label>
    <input style = "width: 200px;" type="text" name="name" placeholder="Please enter your name">
    <br><br>
    <label for="password">Password:</label>
    <input style = "width: 200px;" type="password" name="password">
    <br><br>
    <button type="submit" name = "login">Login</button>
</form>