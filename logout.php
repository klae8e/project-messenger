<?php
    session_start();

    #setcookie("id", "", time()-86400, "/");
    #setcookie("login", "", time()-86400, "/");
    
    unset($_SESSION['user']);

    // Переадресовываем браузер на страницу проверки нашего скрипта
    header("Location: index.php"); exit;

?>
