<?php
/**
 * Created by PhpStorm.
 * User: NumeriCall
 * Date: 4/5/2019
 * Time: 10:13 AM
 */

namespace App\Mailer;

use App\Entity\User;
use Twig\Environment;

class RegistrationMailer
{
    private $mailer;
    private $twig;
    private $subject;
    private $sender;
    private $txtTemplate;
    private $htmlTemplate;


    public function __construct(
        \Swift_Mailer $mailer,
        Environment $twig,
        string $subject,
        string $sender,
        string $txtTemplate,
        string $htmlTemplate
    )
    {
        $this->mailer=$mailer;
        $this->twig=$twig;
        $this->subject=$subject;
        $this->sender=$sender;
        $this->txtTemplate=$txtTemplate;
        $this->htmlTemplate=$htmlTemplate;
    }

    public function sendMail(User $user)
    {
        $message=new \Swift_Message();
        //fill mail subject
        $message->setSubject($this->subject);
            //NO//A string "Activate your account"
            //YES//------A parameter
        //fill mail sender
        $message->setFrom($this->sender);
            //NO//A string "noreply-numeripic@gmail.com"
            //YES//------A parameter
        //fill mail recipient
        $message->setTo($user->getEmail());
            //YES//Coming from user object
        //fill mail content
            //NO//A string: "Thank you "
            //NO//With a link inside
            //YES//------A template
        $message->setBody($this->twig->render($this->htmlTemplate, ['user'=>$user]), 'text/html');
        $message->addPart($this->twig->render($this->txtTemplate, ['user'=>$user]), 'text/plain');
        //send the mail
        $this->mailer->send($message);
    }
}