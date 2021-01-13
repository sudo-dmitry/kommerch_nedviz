<?php

// SMTP PHPMailer

//require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
//require 'vendor/phpmailer/phpmailer/src/SMTP.php';
//
//$mail = new PHPMailer\PHPMailer\PHPMailer();
//$mail->IsSMTP(); // enable SMTP
//
//
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
//$mail->SMTPAuth = true; // authentication enabled
//$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
//$mail->Host = "smtp.gmail.com";
//$mail->Port = 465; // or 587
//$mail->IsHTML(true);
//$mail->Username = "dmitry.v.pletnev";
//$mail->Password = "";
//$mail->SetFrom("dmitry.v.pletnev@gmail.com");
//$mail->Subject = "Test";
//$mail->Body = "hello";
//$mail->AddAddress("dmitry.v.pletnev@gmail.com");
//
//if($mail->Send()) {
//$msg = 'Ваш запрос отправлен';
//$msgClass = 'success';


    $msg = '';
    $msgClass = '';

    if(filter_has_var(INPUT_POST, 'submit')) {
        $name = htmlspecialchars($_POST['name']);
        $tel = htmlspecialchars($_POST['tel']);

        ?>
        <script type="text/javascript">
            $(function() {
               $('#simpleModal').show();
            });
        </script>
        <?php

        if(!empty($name) && !empty($tel)) {

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

<div id="simpleModal" class="modal">
    <div class="modal__content">
        <span class="closeBtn">&times;</span>
        <div class="modal-header">
            <div class="modal-title">Оставьте свои контактные данные и&nbspнаш менеджер свяжется с вами</div>
        </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="modal-body">
                <?php if($msg != ''): ?>
                <div class="alert <?php echo $msgClass; ?>">
                    <?php echo $msg ?>
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <label>Имя:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Телефон:</label>
                    <input type="tel" name="tel" class="form-control" value="<?php echo isset($_POST['tel']) ? $tel : ''; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn">Отправить</button>
            </div>
        </form>
    </div>
</div>