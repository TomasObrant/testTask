<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Account;


class MainController extends Controller {

	public function indexAction() {
        $mainModel = new Account();
        $vars = [
            'list' => $mainModel->usersList($this->route),
        ];
        $this->view->render('Главная страница', $vars);
	}

}