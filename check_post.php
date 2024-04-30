<?php
    session_start();

    unset($_SESSION['user_name']);
    unset($_SESSION['email']);
    unset($_SESSION['subject']);
    unset($_SESSION['message']);

    unset($_SESSION['error_username']);
    unset($_SESSION['error_email']);
    unset($_SESSION['error_subject']);
    unset($_SESSION['error_message']);
    unset($_SESSION['success_mail']);

    function redirect(){
        header('Location: info.php');
        exit;
    }

    $user_name = htmlspecialchars(trim($_POST['username']));
    $from = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    $_SESSION['user_name'] = $user_name;
    $_SESSION['email'] = $from;
    $_SESSION['subject'] = $subject;
    $_SESSION['message'] = $message;

    if($user_name == ""){
        $_SESSION['error_username'] = "*Введите Ваше имя";
        redirect();
    }
    else if(strlen($user_name) <= 1 || preg_match('~[0-9]+~', $user_name)){
        $_SESSION['error_username'] = "*Введите корректное имя";
        redirect();
    }
    else if($from == ""){
        $_SESSION['error_email'] = "*Введите Вашу электронную почту";
        redirect();
    }
    else if(strlen($from) < 5){
        $_SESSION['error_email'] = "*Введите корректную электронную почту";
        redirect();
    }
    else if($subject == ""){
        $_SESSION['error_subject'] = "*Введите тему письма";
        redirect();
    }
    else if(strlen($subject) < 5){
        $_SESSION['error_subject'] = "*Тема сообщения не менее 5 символов";
        redirect();
    }
    else if($message == ""){
        $_SESSION['error_message'] = "*Задайте Ваш вопрос";
        redirect();
    }
    else if(strlen($message) < 10){
        $_SESSION['error_message'] = "*Сообщение не менее 10 символов";
        redirect();
    }
    else{
        $subject = "=?utf-8?B?".base64_encode($subject)."?=";
        $headers = "From: $from\r\nReply-to: $from\r\nContent-type:text/plain; charset=urf-8\r\n";
        mail("maria.orlowets@yandex.ru",$subject, $message, $headers);
        $_SESSION['success_mail'] = "Письмо успешно отправленно!";
        redirect();
    }