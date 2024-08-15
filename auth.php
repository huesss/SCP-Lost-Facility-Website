

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="X4LlC3VjXSG3RagwPwlKuFOqlT0AAJ0tgrJQagWn">

        <title>LCAS</title>

        <!-- Fonts -->
        <script src="/cdn-cgi/apps/head/_gOlz-oZ1nlZbvSTj9VxqI-ITCE.js"></script><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/main.css">
        <style>
        .error-message {
            text-align: center;
            margin-top: 10px;
            color: red;
            font-weight: bold;
        }
    </style>

        <!-- Scripts -->
        <script src="/js/app.js" defer></script>
    </head>
    <body class="dark">
        <div class="font-sans text-gray-900 dark:text-white antialiased">
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div>
        <img height="128" width="128" src="LF.png"></img>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg dark:bg-gray-800">
        <form method="POST" action="handler_reg.php">
            <div>
            <label class="block font-medium text-sm text-gray-700:text-gray-200" for="email">
                Почта
            </label>
            <input class="border-gray-300 dark:border-gray-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-700 dark:text-white block mt-1 w-full"
            id="email" type="email" name="email" required="required" autofocus="autofocus">
       
        </div>
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700:text-gray-200" for="password">
            Пароль
            </label>
            <input class="border-gray-300 dark:border-gray-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-700 dark:text-white block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="current-password">
        </div>
        
        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <input type="checkbox" class="rounded dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                id="remember_me" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-200">Запомнить меня</span>
            </label>
        </div>
        
        <body>
    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-800 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-50" href="forgot-password.php">
            Забыли свой пароль?
        </a>

        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
            Войти
        </button>
    </div>
    <style>
    .error {
        position: fixed;
        bottom: 1050px;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 22px;
        font-weight: bold;
        color: red;
    }
</style>
<?php
session_start();    

if(isset($_SESSION['error'])){
    echo '<div class="error">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
}
?>
        </form>
        <div class="bg-white dark:bg-gray-800 px-4 py-3 flex items-center justify-between border-t border-gray-200 dark:border-gray-700 sm:px-6 mt-5">
                <div>
                    <p class="text-sm text-gray-700 dark:text-gray-200">
                    <b>Несанкционированное использование этой системы строго запрещено.</b><br> Используя этот сайт, вы соглашаетесь хранить файлы cookie на своем устройстве. Ниже вы можете найти ссылки на наши соответствующие политики.
                    </p>
                    <div class="flex justify-center items-center">
                        <a href="https://scplfgame.ru/policy.pdf" target="_blank" class="py-4 underline">Пользовательское соглашение</a>
                        <p>&nbsp;&nbsp;</p>
                        <a href="https://scplfgame.ru/cookiepolicy.pdf" target="_blank" class="py-4 underline">Политика конфедициальности</a>
                    </div>
                    <div class="flex justify-center items-center">
                        <p class="text-sm text-gray-700 dark:text-gray-200">
                        Copyright © 2024-2024 <b>LDev Studios</b></p>
                    </div>
                </div>
        </div>
    </div>
    
</div>
        </div>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v55bfa2fee65d44688e90c00735ed189a1713218998793" integrity="sha512-FIKRFRxgD20moAo96hkZQy/5QojZDAbyx0mQ17jEGHCJc/vi0G2HXLtofwD7Q3NmivvP9at5EVgbRqOaOQb+Rg==" data-cf-beacon='{"rayId":"87a497f08b11005c","version":"2024.4.0","token":"aee0d2eb6c8443c9b2bfcbcf1b0ea51d"}' crossorigin="anonymous"></script>
</body>
</html>
<span class="error1">
    <?php
    session_start();

    if(isset($_SESSION["error"])){
        echo $_SESSION["error"];
        unset($_SESSION["error"]); // аналагично выше в if очищаем переменную
    } else {
        echo "Ошибка";
    }
    ?>
</span>

            </span>
