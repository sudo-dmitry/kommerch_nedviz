<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

    require 'vendor/autoload.php';

    class SendEmail {

        public static function SendMail($from, $subject, $content) {
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom($from);
            $email->setSubject($subject);
            $email->addTo("dmitry.v.pletnev@gmail.com");
            $email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch (Exception $e) {
                echo 'Caught Email exception: '. $e->getMessage() ."\n";
                return false;
            }
        }
    }





//echo 1;
//
//$from = new SendGrid\Mail\EmailAddress("test@example.com", "Dima-test");
//
//echo 2;
//
//$subject = "Hello World from the SendGrid PHP Library!";
//
//echo 3;
//
//$to = new SendGrid\Mail\EmailAddress("dmitry.v.pletnev@gmail.com", null);
//
//echo 4;
//
//$content = new SendGrid\Mail\Content("text/plain", "Hello, Email!");
//
//echo 5;
//
//$mail = new SendGrid\Mail\Mail($from, $subject, $to, $content);
//
//echo 6;
//
//$apiKey = getenv('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');
//
//echo 7;
//
//$sg = new \SendGrid($apiKey);
//
//echo 8;
//
//?><!--<pre>--><?// print_r($sg) ?><!--</pre>--><?php
//
//echo 9;
//
//$response = $sg->client->mail()->send()->post($mail);
//
//echo 10;
//
//echo $response->statusCode();
//
//echo 11;
//
//echo $response->headers();
//
//echo 12;
//
//echo $response->body();
//
//echo 13;

?>