<?php

namespace App\Controllers\Auth;

use App\Core\Mvc;
use App\Core\Validator;
use App\Model\User;
use App\Core\Controller;
use App\Core\Http\Response;

class AuthController extends Controller
{

    protected $post;

    public function __construct(public Mvc $mvc)
    {
        parent::__construct($mvc);
        $this->post =  $this->mvc->request->getPost();
    }

    public function index()
    {
        // pagina login
        $this->render('Auth.login');
    }

    public function login()
    {
        // login post (quando inserisce le credenziali)

        $data = $this->post;

        $user = User::where('email', $data['email'])->first();

        $confirmPassword = password_verify($data['password'], $user['password']);

        if ($confirmPassword === false) {
            return $this->render('Auth.login', ['message' => 'Credenziali non valide!']);
        }

        return $this->mvc->response->redirect('admin/dashboard');
    }

    public function forgotPassword()
    {
        $this->render('Auth.forgot');
    }

    public function signUp()
    {
        $user = User::findAll();
        //  var_dump($user); exit;
        if (count($user) == 0) {
            $this->render('Auth.sign-up', ['message' => '']); // fa caldo
        } else {
            // se esiste un utente, ritorna alla pagina di login
            $this->mvc->response->redirect('/login');
        }
    }

    public function registration()
    {
        $data = $this->post;


        $confirmed =  Validator::confirmedPassword($data);
        if ($confirmed === false) {
            return $this->render('Auth.sign-up', ['message' => 'Le password non corrispondono']);
        }

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        User::save($data);

        $this->render('Auth.login', ['message' => 'Registrazione Effettuata, Ora Iscriviti!']);
    }
}
