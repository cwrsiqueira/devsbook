<?php
namespace src\controllers;

use \core\Controller;
use \src\Handlers\LoginHandler;

class HomeController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $this->render('home', ['loggedUser' => $this->loggedUser]);
    }

}