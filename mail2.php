<?php
    //Получаем данные из глобальной переменной $_GET, так как мы передаем данные методом GET
    $name = $_GET['Name']; // Вытаскиваем имя в переменную
    $email = $_GET['Email']; // Вытаскиваем почту в переменную
    $tell = $_GET['Telegram/WhatsApp'];
    $message = "Форма обратной связи<br> Заявка на: VIP HUNTERS бесплатная регистрация<br> Имя: $name<br> Почта: $email<br> Telegram/WhatsApp: $tell"; // Формируем сообщение, отправляемое на почту
    $to = "natalipbm@gmail.com, orenlr56@yandex.ru"; // Задаем получателя письма
    $from = "Invest crypto evening"; // От кого пришло письмо
    $subject = "Письмо с сайта Invest crypto evening"; // Задаем тему письма
    $headers = "From: $from\r\nReply-To: $to\r\nContent-type: text/html; charset=utf-8\r\n"; // Формируем заголовок письма (при неправильном формировании может ломаться кодировка и т.д.)
    if (mail($to, $subject, $message, $headers)) { // При помощи функции mail, отправляем сообщение, проверяя отправилось оно или нет
        sleep(3);
        header("Location: index.html");
    }
    else {
        echo "<p>Ошибка <a href='/'>Вернуться на главную</a>"; // Письмо не отправилось
    }
?>
