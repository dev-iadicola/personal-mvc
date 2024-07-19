<?php
namespace App\Controllers;
use \App\Core\Controller;
use \App\Core\Component;
use \App\Core\Mvc;

use App\Model\Contatti;

class ContattiController extends Controller {

    public function __construct(public Mvc $mvc) {
        parent::__construct($mvc);
    }

    public function index() {
        $this->render('contatti', [
            'form' => $this->getFormComponent(),
            'message' => 'Inserisci i dati',            
        ]);
    }

    /**
     * Summary of getFormComponent
     * 
     * Inseriamo i componenti da inserire per sostotuire i placeholder
     */
    public function getFormComponent() {
        $form = new Component('formcontatti');
        $form->setItem(['titoloform' => 'Form contatti']);
        return $form;
    }

    public function sendForm() {
        $this->render('contatti', [
            'message' => $this->checkThsiForm(),
            'form' => $this->getFormComponent()
        ]);
    }

    public function checkThsiForm() {
        $model = new Contatti($this->mvc->pdo);
        $post = $this->mvc->request->getPost();
        if($model->checkForm($post)) {
            $model->save($post);
            return 'Il form è stato inviato!';
        }
        return 'Controllare la correttezza dei campi';
    }

}