<?php

//    require 'vendor/autoload.php';
//
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

require 'vendor/autoload.php';

echo 1;

$from = new SendGrid\Email(null, "test@example.com");
$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Email(null, "dmitry.v.pletnev@gmail.com");
$content = new SendGrid\Content("text/plain", "Hello, Email!");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('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');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);

echo $response->statusCode();
echo $response->headers();
echo $response->body();

echo 2;

?>