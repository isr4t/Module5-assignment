<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
    $user_data = "$username|$email|$password|user\n";
    file_put_contents('users.txt', $user_data, FILE_APPEND);

    echo 'Registration successful!';
}
?>


<form action="register.php" method="post">
    Username: <input type="text" name="username"><br>
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Register">
</form>
