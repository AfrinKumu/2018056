<?php
session_start();

$admin_user = 'admin'; // Change this to your admin username
$admin_pass = 'password'; // Change this to your admin password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $admin_user && $password == $admin_pass) {
        $_SESSION['loggedin'] = true;
        header("Location: admin_panel.php");
    } else {
        echo "Incorrect username or password";
    }
}
?>
