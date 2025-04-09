<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$password_check = $_POST['password_check'];


require_once "../../../config/conn.php";

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    die('Error: email is ongeldig!');
}

if ($password !== $password_check) {
    die("Error: wachtwoord is niet tweemaal hetzelfde ingevoerd!");
}

$query = "SELECT * FROM users WHERE username = :email";
$statement = $conn->prepare($query);
$statement->execute([
    ':email' => $email
]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

$query = "SELECT * FROM users WHERE username = :email";
$statement = $conn->prepare($query);
$statement->execute([
    ":email" => $email
]);

if ($statement->rowCount() > 0) {
    die("Error: account bestaat al.");
}

$query = "INSERT INTO users (username, password) VALUES (:email, :hash)";
$statement = $conn->prepare($query);
$statement->execute([
    ":email" => $email,
    ":hash" => password_hash($password, PASSWORD_DEFAULT)
]);

$_SESSION['user_id'] = $user['id'];

header("Location: ../../../login.php?msg=Account aangemaakt!");
exit();
