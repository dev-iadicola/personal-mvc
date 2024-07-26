<?php
namespace App\Controllers\Auth;
use App\Core\Mvc;
use App\Model\User;
use App\Core\Validator;
use App\Core\Controller;

class TokenController extends Controller{

    public function __construct(public Mvc $mvc) {
        parent::__construct($mvc);
    }

    public function forgotPasswordToken(){

        $post = $this->mvc->request->getPost();

        $validator = Validator::validate(
            [$post['email']  => 'email'], 
        ['email' => 'Formato email Non valido!']);

        if($validator->fails() === true){
          return $this->render('Auth.forgot',['message' =>$validator->errors()]);
        }

        $user = User::where('email',$post['email'])->first();

        // var_dump($user); exit;

        if(empty($user)){
            return $this->render('Auth.forgot',['message' =>'Email non Esistente']);
        }
        else
        {
           return $this->render('Auth.login',['message' =>'Email Inviata']);
        }

    }

  
}