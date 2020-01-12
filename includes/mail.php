<?php
require_once('classes/mailer/phpmailer.php');
require_once('includes/config.php');

class Mail extends PhpMailer
{
    // Set default variables for all new objects
    public $From     = MAIL_FROM;
    public $FromName = MAIL_FROM_NAME;
    public $Host     = MAIL_HOST;
    public $Mailer   = MAIL_MAILER;
    public $SMTPAuth = MAIL_SMTP_AUTH;
    public $Username = MAIL_USERNAME;
    public $Password = MAIL_PASSWORD;
    public $SMTPSecure = MAIL_SMTP_SECURE;
    public $WordWrap = 75;
    public $Port = MAIL_PORT;
    
    public function init($to, $subject, $body)
    {
        $this->addAddress($to);
        $this->Subject = $subject;
        $this->Body = $body;
    }

    public function subject($subject)
    {
        $this->Subject = $subject;
    }

    public function body($body)
    {
        $this->Body = $body;
    }

    public function send()
    {
        $this->AltBody = strip_tags(stripslashes($this->Body))."\n\n";
        $this->AltBody = str_replace("&nbsp;", "\n\n", $this->AltBody);
        return parent::send();
    }
}
