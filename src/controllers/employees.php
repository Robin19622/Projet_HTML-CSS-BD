<?php
class employees extends controller
{
    var $employee;
    function __construct()
    {
        parent::__construct();
        $this->loadmodel('employee'); // Charger le modèle 'employee'
        $this->employee = $this->models['employee'];
    }
    function index()
    {
        $d = [];
        $d['employees'] =  $this->employee->getLast(999);
        $this->set($d);
        $this->render('index');
    }
    function admin_index()
    {
        if ($this->Session->isLogged()) {
            $d = array();
            $d['employees'] = $this->employee->getLast(10);
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable " . $_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $this->layout = 'default';
            $this->render('index');
        }
    }
    function admin_edit($id = null)
    {
        if ($this->Session->isLogged()) {
            if (!empty($_POST)) {
                $_POST['JOB_ID'] = "TEST";
                $_POST['EMAIL'] = "t@gmail.com";
                $_POST['HIRE_DATE'] = date('Y-m-d');
                if ($this->employee->saveEmployee($_POST)) {
                    $this->Session->setFlash(" action effectue  ", '<i class="fas fa-check"></i>', "success");
                } else {
                    $this->Session->setFlash("action non effectue  ", '<i class="fas fa-times"></i>', "success");
                }
                $d = array();
                $d['employees'] = $this->employee->getLast(10);
                $this->set($d);
                $this->layout = 'admin';
                $this->render('admin_index');
            } else {
                if (!empty($id)) {
                    $d['employee'] = $this->employee->getEmployee($id);
                    var_dump($d['employee']);
                    $this->set($d);
                }
                $this->layout = 'admin';
                $this->render('admin_form');
            }
        } else {
            $this->Session->setFlash("Appli impiratable " . $_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $this->layout = 'default';
            $this->render('index');
        }
    }

    function admin_delete($id)
    {
        if ($this->Session->isLogged()) {
            if ($this->employee->deleteEmployee($id)) {
                $this->Session->setFlash("supression bien effectue ", '<i class="fas fa-check"></i>', "success");
            } else {
                $this->Session->setFlash("supression pas ", '<i class="fas fa-times"></i>', "success");
            }
            $d = array();
            $d['employees'] = $this->employee->getLast(999);
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable " . $_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $this->layout = 'default';
            $this->render('index');
        }
    }
}
