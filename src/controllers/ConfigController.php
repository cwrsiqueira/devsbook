<?php
namespace src\controllers;

use \core\Controller;
use \src\Handlers\UserHandler;

class ConfigController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index() {

        $this->render('config', 
            [
                'loggedUser' => $this->loggedUser,
            ]
        );
    }

    public function edit($atts = []) {
        $_SESSION['flash'] = '';
        $_SESSION['success'] = '';

        $id = $atts['id'];
        $avatar = filter_input(INPUT_POST, 'avatar');
        $cover = filter_input(INPUT_POST, 'cover');
        $name = filter_input(INPUT_POST, 'name');
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $city = filter_input(INPUT_POST, 'city');
        $work = filter_input(INPUT_POST, 'work');
        $new_password = filter_input(INPUT_POST, 'new_password');
        $confirm_new_password = filter_input(INPUT_POST, 'confirm_new_password');

        $qtData = explode('-', $birthdate);
        if(count($qtData) != 3 || !strtotime($birthdate)) {
            $_SESSION['flash'] = 'Data de Nascimento inválida!';
            $this->redirect('/config');
        }

        if($new_password !== $confirm_new_password) {
            $_SESSION['flash'] = 'Confirmação de senha diferente da senha!';
            $this->redirect('/config');
        }

        if(UserHandler::editUser($id, $avatar, $cover, $name, $birthdate, $city, $work, $new_password)) {
            $_SESSION['success'] = 'Dados alterados com sucesso!';
        }

        $this->redirect('/config');
    }

}
