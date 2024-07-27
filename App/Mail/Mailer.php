<?php 
namespace App\Mail;

use App\Core\Connection\SMTP;
use PHPMailer\PHPMailer\Exception as ExceptionSMTP;

class Mailer {
    private SMTP $smtp;

    public function __construct(SMTP $smtp) {
        $this->smtp = $smtp;
    }

    public function sendEmail(
        string $to, 
    string $subject,
     string $body, 
    string $from = 'default@example.com', 
    string $fromName = 'Default Sender'): bool {
        $mail = $this->smtp->getMailer();

        try {
            $mail->setFrom($from, $fromName);
            $mail->addAddress($to);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            return $mail->send();
        } catch (ExceptionSMTP $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}
