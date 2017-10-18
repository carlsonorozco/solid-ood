<?php

// Non Compliant

class Mailer {}

class SendWelcomeMessage
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}

$mailer = new Mailer();
$welcomeEmail = new SendWelcomeMessage($mailer)

// Compliant

interface Mailer
{
    public function send();
}

class SmtpMailer implements Mailer
{
    public function send()
    {
    }
}

class SendGridMailer implements Mailer
{
    public function send()
    {
    }
}

class SendWelcomeMessage
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}

$smtpMailer = new SmtpMailer();
$sendGridMailer = new SendGridMailer();

$welcomeEmailViaSmtp = new SendWelcomeMessage($smtpMailer);
$welcomeEmailViaSmtp->send();

$welcomeEmailViaSendGrid = new SendWelcomeMessage($sendGridMailer);
$welcomeEmailViaSendGrid->send();
