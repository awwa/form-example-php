<?php
require 'vendor/autoload.php';
Dotenv::load(__DIR__);

$sendgrid_username = $_ENV['SENDGRID_USERNAME'];
$sendgrid_password = $_ENV['SENDGRID_PASSWORD'];
$from              = $_ENV['FROM'];
$to                = $_ENV['TO'];

$name = $_POST['name'];
$emailadd = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sendgrid = new SendGrid($sendgrid_username, $sendgrid_password, array("turn_off_ssl_verification" => true));
$email    = new SendGrid\Email();
$email->addTo($to)->
       setFrom($from)->
       setFromName("問合せフォーム")->
       setSubject("[ContactForm] $subject")->
       setText("Name: $name \r\nEmail: $emailadd \r\nSubject: $subject \r\nMessage: $message \r\n")->
       setHtml("<strong>Name:</strong> $name<br /> <strong>Email:</strong> $emailadd<br /> <strong>Subject:</strong> $subject<br /> <strong>Message:</strong> $message<br /> ")->
       addCategory('contact');

$response = $sendgrid->send($email);
var_dump($response);

// 正常終了時にthanks.htmlへリダイレクト
header('Location: thanks.html');
exit();

