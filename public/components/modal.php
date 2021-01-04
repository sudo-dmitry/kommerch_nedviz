<?php

    require 'vendor/autoload.php';
    use Mailgun\Mailgun;

    $mgClient = Mailgun::create('PRIVATE_API_KEY', 'https://API_HOSTNAME');
    $domain = "kommerchnedviz.herokuapp.com";
    $params = array(
        'from'    => 'Excited User <YOU@YOUR_DOMAIN_NAME>',
        'to'      => 'dmitry.v.pletnev@gmail.com',
        'subject' => 'Hello',
        'text'    => 'Testing some Mailgun awesomness!'
    );

    $mgClient->messages()->send($domain, $params);

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