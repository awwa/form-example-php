# sendgridjp-php-example-contact-form

 本コードは[SendGrid公式PHPライブラリ](https://github.com/sendgrid/sendgrid-php)の利用サンプルです。

## 使い方

```bash
git clone http://github.com/sendgridjp/sendgridjp-php-example-contact-form.git
cd sendgridjp-php-example-contact-form
cp .env.example .env 
# .envファイルを編集してください
composer install
```
一式をサーバにアップロードし、Form.html にアクセスしてください。

## .envファイルの編集
.envファイルは以下のような内容になっています。

```bash
SENDGRID_USERNAME=your_username
SENDGRID_PASSWORD=your_password
TO=you@youremail.com
FROM=you@youremail.com
```
SENDGRID_USERNAME:SendGridのユーザ名を指定してください。  
SENDGRID_PASSWORD:SendGridのパスワードを指定してください。  
TOS:フォームの内容を送信する宛先を指定してください。  
FROM:フォームの内容を送信する際のFromアドレスを指定してください。  


