<?php 
namespace App\Core\Connection;

use PHPMailer\PHPMailer\PHPMailer;

class SMTP {
    public PHPMailer $mail;

    public function __construct(){
        define('HOST', getenv(''));
        define('USER', getenv('DB_USER'));
        define('PSW', getenv('DB_PSW'));
        define('NAME', getenv('DB_NAME'));
        define('PORT', getenv('DB_PORT') ?: 3306); // Usa la porta 3306 come predefinita se DB_PORT non è definito

        $this->mail = new PHPMailer(true);

        $this->mail->SMTPDebug  = 1; 
        $this->mail->isSMTP();

        $this->mail->Host         = getenv('SMTP_HOST');
        $this->mail->SMTPAuth     = getenv('SMTP_AUTH');
        $this->mail->Username     = getenv('SMTP_USERNAME');
        $this->mail->Password     = getenv('SMTP_PASSWORD');
        $this->mail->SMTPSecure   = getenv('SMTP_SECURE');
        $this->mail->Port         = getenv('SMTP_PORT');


    }

  
}