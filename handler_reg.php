<?php
session_start();
$host = 'localhost';
$port = '3306';
$dbname = 'site1';
$username = 'root';
$password = '';

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Ошибка подключения к базе данных: ' . $e->getMessage());
}

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM licensed_keysite WHERE email = :email AND password = :password");
    $stmt->bindParam(':username', $email);
    $stmt->bindParam(':password', $password);


    $row = $stmt->fetch();

    if ($row) {
        header('Location: panel.php');
        exit();
    } else {
        $_SESSION['error'] = 'Такой ник/почта уже есть!';
        header('Location: panel.php');
        exit();
    }
} else {
    $_SESSION['error'] = 'Ошибка при выполнении SQL запроса: ' . $stmt->errorInfo()[2];
    header('Location: panel.php');
    exit();
}
?>