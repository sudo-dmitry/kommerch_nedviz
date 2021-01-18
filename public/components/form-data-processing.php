<?php

// Send email and update DB

$msg = '';
$msgClass = '';

if(filter_has_var(INPUT_POST, 'submit')) {

    ?>
    <script type="text/javascript">
        $(function() {
            $('#simpleModal').show();
        });
    </script>
    <?php


    $name = htmlspecialchars($_POST['name']);
    $tel = htmlspecialchars($_POST['tel']);

    if(!empty($name) && !empty($tel)) {

        // Send Email

        $toEmail = 'dmitry.v.pletnev@gmail.com';
        $subject = 'Запрос от '.$name;
        $body = '
                    <h2>Запрос на звонок</h2>
                    <h4>Имя</h4><p>'.$name.'</p>
                    <h4>Телефон</h4><p>'.$tel.'</p>
                ';

        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

        $headers .="From: " .$name. "<" .$tel. ">". "\r\n";


        // Update DB

        include './db.php';



        if(mail($toEmail, $subject, $body, $headers)) {
            $msg = 'Ваш запрос отправлен';
            $msgClass = 'success';
        } else {
            $msg = 'Ошибка';
            $msgClass = 'fail';
        }

    } else {
        $msg = 'Пожалуйста, заполните все поля';
        $msgClass = 'fail';
    }
}

?>