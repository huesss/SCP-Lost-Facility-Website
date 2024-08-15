<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель доступа</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #fff;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            position: relative;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #444;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }
        h1, h2, h3 {
            color: #fff;
        }
        p {
            color: #ccc;
        }
        .logo {
            width: 150px;
            margin: 0 auto 20px;
        }
        .add-server-panel {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            background-color: #555;
            border: 2px solid #008000;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            display: none;
        }
        .server-list {
            margin-top: 20px;
            text-align: left;
            background-color: #555;
            border: 2px solid #008000;
            border-radius: 10px;
            padding: 20px;
        }
        .server-list p {
            color: #fff;
            margin-bottom: 10px;
        }
        .server {
            background-color: #555;
            border: 2px solid #008000;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .server p {
            color: #fff;
            margin-bottom: 10px;
        }
        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #666;
        }
        .create-server-btn {
            background-color: #008000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .create-server-btn:hover {
            background-color: #006400;
        }
        .play-btn {
            background-color: #7FFF00;
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
        }
        .play-btn:hover {
            background-color: #ADFF2F;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
            display: none;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #fff;
            text-align: left;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #666;
            background-color: #555;
            color: #fff;
            margin-bottom: 10px;
        }
        button[type="submit"] {
            background-color: #008000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #006400;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="LF.png" alt="SCP: Lost Facility" class="logo">
        <h1>SCP: Lost Facility Central Server</h1>

<!-- НЕ РАБОТАЕТ, САЙТ НА ПЕРЕРАБОТКЕ! КТО ЗАХОЧЕТ ПЕРЕДЕЛАЕТ И КИНЕТ В ПУЛЛЫ, БУДУ РАД! --> 

<?php
$host = 'localhost';
$port = '3306';
$dbname = 'site1';
$username = 'root';
$password = '';

session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    echo "<p>Нет доступа к панели. Пожалуйста, войдите сначала.</p>";
    exit; 
}

// Подключение к базе данных
try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userID = $_SESSION['user_id'];
    $stmt = $pdo->prepare("SELECT is_admin FROM 1 WHERE id = :user_id");
    $stmt->bindParam(':user_id', $userID);
    $stmt->execute();
    $is_admin = $stmt->fetchColumn();

    if($is_admin) {
        echo "<p>Вы успешно авторизованы на панели!</p>";
        echo "<button class='create-server-btn' onclick='toggleCreateServerPanel()'>Начать создание</button>";

        $stmt = $pdo->prepare("SELECT * FROM 1");
        $stmt->execute();
        $servers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($servers as $server) {
            echo "<div class='server'>";
            echo "<p><strong>Имя:</strong> " . htmlspecialchars($server['name']) . "</p>";
            echo "<p><strong>IP:</strong> " . htmlspecialchars($server['ip']) . "</p>";
            echo "<button class='play-btn' onclick='launchGame(\"" . htmlspecialchars($server['ip']) . "\")'>PLAY</button>";
            echo "</div>";
            echo "<hr>";
        }
    } else {
        echo "<p>Нет доступа к панели. Пожалуйста, войдите как администратор.</p>";
    }
} catch (PDOException $e) {
    echo 'Ошибка: ' . htmlspecialchars($e->getMessage());
}
?>




        <div class="add-server-panel" id="add-server-panel">
            <h2>Добавить сервер</h2>
            <form method="post" onsubmit="return addServer()">
                <label for="server-name">Название сервера:</label>
                <input type="text" id="server-name" name="server-name">
                <label for="server-ip">Айпи сервера:</label>
                <input type="text" id="server-ip" name="server-ip">
                <button type="submit">Добавить</button>
            </form>
        </div>

        <div class="overlay" id="overlay" onclick="toggleCreateServerPanel()"></div>

        <script>
            function toggleCreateServerPanel() {
                var panel = document.getElementById("add-server-panel");
                var overlay = document.getElementById("overlay");
                if (panel.style.display === "none") {
                    panel.style.display = "block";
                    overlay.style.display = "block";
                } else {
                    panel.style.display = "none";
                    overlay.style.display = "none";
                }
            }

            function addServer() {
                var serverName = document.getElementById('server-name').value;
                var serverIp = document.getElementById('server-ip').value;
                var xhr = new XMLHttpRequest();
                xhr.open("POST", window.location.href, true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                    }
                };
                xhr.send("server-name=" + serverName + "&server-ip=" + serverIp);
                return false;
            }

            function launchGame(ip) {
                window.location.href = "file://SCPLF.exe?ip=" + ip;
            }
        </script>
    </div>
</body>
</html>
