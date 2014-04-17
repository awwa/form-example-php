<?php
require 'vendor/autoload.php';
Dotenv::load(__DIR__);

$sendgrid_username = $_ENV['SENDGRID_USERNAME'];
$sendgrid_password = $_ENV['SENDGRID_PASSWORD'];
$from              = $_ENV['FROM'];
$tos               = explode(',', $_ENV['TOS']);

$sendgrid = new SendGrid($sendgrid_username, $sendgrid_password, array("turn_off_ssl_verification" => true));
$email    = new SendGrid\Email();
$email->setTos($tos)->
       setFrom($from)->
       setFromName("送信者名")->
       setSubject("[sendgrid-php-example] フクロウのお名前は%fullname%さん")->
       setText("%familyname% さんは何をしていますか？\r\n 彼は%place%にいます。")->
       setHtml("<strong> %familyname% さんは何をしていますか？</strong><br />彼は%place%にいます。")->
       addSubstitution("%fullname%", array("田中 太郎", "佐藤 次郎", "鈴木 三郎"))->
       addSubstitution("%familyname%", array("田中", "佐藤", "鈴木"))->
       addSubstitution("%place%", array("%office%", "%home%", "%office%"))->
       addSection('%office%', '中野')->
       addSection('%home%', '目黒')->
       addCategory('カテゴリ1')->
       addHeader('X-Sent-Using', 'SendGrid-API')->
       addAttachment('./gif.gif', 'owl.gif');

$response = $sendgrid->send($email);
var_dump($response);
