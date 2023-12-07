<?php
class users extends controller
{
    var $user;
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('user');
        $this->user = $this->models['user'];
    }

    public function index()
    {
        $d = [];
        if (!empty($_POST)) {

            $user = $this->user->getUser($_POST['login'], $_POST['password']);

            if (!empty($user)) {

                $this->Session->setFlash("Connexion ok", '<i class="fas fa-check"></i>', "success");
                $this->Session->write('User', $user);
            } else {
                $this->Session->setFlash("Connexion incorrect ", '<i class="fas fa-times"></i>', "danger");
            }
        }
        $this->set($d);
        if ($this->Session->isLogged()) {
            $this->layout = 'admin';
            $this->render('loginok');
        } else {

            $this->render('index');
        }
    }
    public function logout()
    {
        unset($_SESSION['User']);
        $this->layout = 'default';
        $this->render('index');
    }
}
