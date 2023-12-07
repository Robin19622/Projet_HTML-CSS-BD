<?php

class departements extends controller
{
    var $departement;

    var $employee;

    var $location;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('departement');
        $this->loadModel('employee');
        $this->loadModel('location');
        $this->location = $this->models['location'];
        $this->employee = $this->models['employee'];
        $this->departement = $this->models['departement'];
    }

    public function index(): void
    {
        $d = [];
        $d['departements'] = $this->departement->getAllDepartment();
        $this->set($d);
        $this->render('index');
    }

    public function admin_index(): void
    {
        if ($this->Session->isLogged()) {
            $d = [];
            $d['departements'] = $this->departement->getAllDepartment();
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['departements'] = $this->departement->getAllDepartment();
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }

    public function admin_edit($id = null): void
    {
        if ($this->Session->isLogged()) {
            if (!empty($_POST)) {
                if ($this->departement->savedepartement($_POST)) {
                    $this->Session->setFlash(" action effectue  ", '<i class="fas fa-check"></i>', "success");
                } else {
                    $this->Session->setFlash("action non effectue  ", '<i class="fas fa-times"></i>', "success");
                }
                $d = [];
                $d['departements'] = $this->departement->getAllDepartment();
                $this->set($d);
                $this->layout = 'admin';
                $this->render('admin_index');
            } else {
                $d = [];
                if (!empty($id)) {
                    $d['departement'] = $this->departement->getdepartement($id);
                }
                $d['managers']= $this->employee->getAllManagers();
                $d['locations']= $this->location->getAlllocations();
                $this->set($d);
                $this->layout = 'admin';
                $this->render('admin_form');
            }
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['departements'] = $this->departement->getAllDepartment();
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }

    public function admin_delete($id): void
    {
        if ($this->Session->isLogged()) {
            if ($this->departement->deletedepartement($id)) {
                $this->Session->setFlash("supression bien effectue ", '<i class="fas fa-check"></i>', "success");
            } else {
                $this->Session->setFlash("supression pas ", '<i class="fas fa-times"></i>', "success");
            }
            $d = [];
            $d['departements'] = $this->departement->getAllDepartment();
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['departements'] = $this->departement->getAllDepartment();
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }


}
