<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $lines = file('users.txt', FILE_IGNORE_NEW_LINES);
    
    foreach ($lines as $line) {
        list($username, $stored_email, $stored_password, $role) = explode('|', $line);
        if ($email === $stored_email && password_verify($password, $stored_password)) {
            
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            
            if ($role === 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
        }
    }

    echo 'Login failed. Please check your credentials.';
}
?>


<form action="login.php" method="post">
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
