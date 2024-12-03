<?php
require ("../config/db_connection.php"); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "<script>alert('Todos los campos son obligatorios')</script>";
        exit;
    }


    if ($password !== $confirm_password) {
        echo "<script>alert('Las contraseñas no coinciden')</script>";
        exit;
    }


    $hashed_password = password_hash($password, PASSWORD_BCRYPT);


    $query = "SELECT * FROM clientes WHERE email = '$email'";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);
    
    if ($row) {
        echo "<script>alert('Email ya existe')</script>";
        header('Refresh:0; url=http://127.0.0.1/stevenbotina.github.io/register.html');
        exit();
    }

    $query = "INSERT INTO clientes (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";
    $result = pg_query($conn, $query);

    if ($result) {
        echo "<script>alert('Registration Successful!')</script>";
        header('Refresh:0; url=http://127.0.0.1/stevenbotina.github.io/login.html');
    } else {
        echo "Error occurred ";
    }
}
?>
