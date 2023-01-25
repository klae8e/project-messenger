<?php
    session_start();

    setcookie($_SESSION['user'], "", time()-86400, "/");
    
    unset($_SESSION['user']);

    // Переадресовываем браузер на страницу проверки нашего скрипта
    header("Location: /"); exit;

?>
