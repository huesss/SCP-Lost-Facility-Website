<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация | SCP: Lost Facility</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #333;
    color: #fff;
    text-align: center;
}

.container {
    max-width: 80%;
    width: 30%;
    margin: 0px auto;
    background-color: #444;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0,0.5);
    margin-top: 5%;
}

h1 {
     color: #fff;
}

form {
    margin-top: 20px;
}
input[type="text"],
input[type="email"],
input[type="password"]


{
    width: 250px;
    margin-left: auto;
    margin-right: auto;
    display: block;
    padding: 8px;
    margin-bottom: 10px;
    background-color: #555;
    color: #fff;
    border: none;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    margin-top: 20px;
    position: relative;
    top: -25px;
    background-color: #808080;
    color: white;   
    border: none;
    border-radius: 5px;
    padding: 10px 20px ;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.logo {
max-width: 100%;
height: auto;
}


    </style>
</head>
<body>
<div class="container">
    <img src="LF.png" alt="LFLOGO" class="Logo" width="280" height="250"><br>
    <h1> Регистрация нового пользователя</h1>
    <form method="post">
        <input type="text" size="20" name="new_username" placeholder="Имя пользователя" required><br>
        <input type="email" name="email" placeholder="Электронная почта" required><br>
        <input type="password" name="new_password" placeholder="Пароль" required><br>
        <input type="password" name="confirm_password" placeholder="Повторите пароль" required><br>
        <button type="submit">Зарегистрироваться</button>
    </form>
</div>
</body>
</html>5