<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

    require './vendor/autoload.php';

//    class SendEmail {
//
//        public static function SendMail($from, $subject, $content) {
//            $key = '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';
//
//            $email = new \SendGrid\Mail\Mail();
//            $email->setFrom($from);
//            $email->setSubject($subject);
//            $email->addTo("dmitry.v.pletnev@gmail.com");
//            $email->addContent("text/html", $content);
//
//            $sendgrid = new \SendGrid($key);
//
//            try{
//                $response = $sendgrid->send($email);
//                return $response;
//            }catch (Exception $e) {
//                echo 'Caught Email exception: '. $e->getMessage() ."\n";
//                return false;
//            }
//        }
//    }





echo 1;
echo 2;

$from = new SendGrid\Mail\EmailAddress("test@example.com", "Dima-test");

?><pre><? print_r($from) ?></pre><?php

$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Mail\EmailAddress("dmitry.v.pletnev@gmail.com", null);
$content = new SendGrid\Mail\Content("text/plain", "Hello, Email!");
$mail = new SendGrid\Mail\Mail($from, $subject, $to, $content);

$apiKey = getenv('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');
$sg = new \SendGrid($apiKey);

?><pre><? print_r($sg) ?></pre><?php

$response = $sg->client->mail()->send()->post($mail);

echo $response->statusCode();
echo $response->headers();
echo $response->body();

echo 2000;

?>