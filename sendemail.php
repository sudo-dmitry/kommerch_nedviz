<?php

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

?>