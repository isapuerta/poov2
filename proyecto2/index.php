<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: usuario.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
    <a href="logout.php">Logout</a>
</body>
</html>