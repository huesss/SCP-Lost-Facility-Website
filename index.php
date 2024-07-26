<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCP: Lost Facility</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #fff;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #444;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            margin-top: 50px;
        }
        h1, h2 {
            color: #fff;
        }
        p {
            color: #ccc;
        }
        form {
            margin-top: 20px;
        }
        input {
            padding: 8px;
            margin-right: 10px;
            margin-bottom: 10px;
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
        button {
            padding: 8px 20px;
            background-color: #808080;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 200px;
        }
        .copy {
            margin-top: 50px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <button onclick="window.location.href='reg.php'">Зарегестрироватся</button>
        <img src="LF.png" alt="Lost Facility Logo" class="logo">
        <h1>SCP: Lost Facility</h1>
        <form method="post">
            <input type="text" name="username" placeholder="Введите имя пользователя"><br>
            <input type="password" name="password" placeholder="Введите пароль"><br>
            <button type="submit">Войти</button>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $enteredUsername = $_POST ["username"];
                $enteredPassword = $_POST['password'];
                
                $host = 'localhost';
                $port = '3306';
                $dbname = 'site1';
                $username = 'root';
                $password = '';
                
                try {
                    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $pdo->prepare("SELECT * FROM licensed_keysite WHERE username = :username AND password = :password");
                    $stmt->bindParam(':username', $enterned);
                    $stmt->bindParam(':password', $enteredPassword);
                    $stmt->execute();
                    $user = $stmt->fetch();
                    
                    if ($user) {
                        // Генерация ключа
                        $generatedKey = base64_encode(random_bytes(32));

                        // Переадресация на панель с ключом
                        $redirectionURL = 'panel.php?key=' . $generatedKey;
                        header('Location: ' . $redirectionURL);
                        exit();
                    } else {
                        echo "<p>Ошибка: Неверное имя пользователя или пароль. Доступ запрещен.</p>";
                    }
                    
                } catch (PDOException $e) {
                    echo 'Ошибка: ' . $e->getMessage();
                }
            }
        ?>
   <!--     <p><b>Unauthorized use of this system is strictly prohibited. </b> By using this site you agree to store cookies on your device. You can find links to our respective policies below.</p>
        <p class="copy">&copy; 2023-2024 LDev Studios</p> -->
    </div>
</body>
</html>
