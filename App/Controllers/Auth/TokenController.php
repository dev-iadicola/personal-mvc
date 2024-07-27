<?php

namespace App\Controllers\Auth;

use App\Core\Mailer\Mailer;
use App\Core\Mvc;
use App\Model\User;
use App\Core\Validator;
use App\Core\Controller;

class TokenController extends Controller
{

    public function __construct(public Mvc $mvc)
    {
        parent::__construct($mvc);
    }

    public function forgotPasswordToken()
    {

        $post = $this->mvc->request->getPost();

        // Validazione dei campi input 

        $validator = Validator::validate(
            [$post['email']  => 'email'],
            ['email' => 'Formato email Non valido!']
        );

        if ($validator->fails() === true) {
            return $this->render('Auth.forgot', ['message' => $validator->errors()]);
        }

        // Validazione Presenza Utente nel DB

        $user = User::where('email', $post['email'])->first();
        if (empty($user)) {
            return $this->render('Auth.forgot', ['message' => 'Email non Esistente']);
        }

        // Creazione del corpo della mail

        $mailer = $this->mvc->mailer;
        $to = $post['email'];
        $subject = 'Test Email';
        $body = '<p>Clicca qui per aprire modificare la mail</p>'; //attendere per l'algoritmo per poter prendere il file da inviare anzichè un HTML

        // Validazione Mail

        if (!$mailer->sendEmail($to, $subject, $body)) {
            return $this->render('Auth.forgot', ['message' => 'ERRORE: La mail non è stata inviata']);
        }

        // Reindirizzamento di successo 

        return $this->render('Auth.login', ['message' => 'Mail inviata con successo!']);
    }
}
