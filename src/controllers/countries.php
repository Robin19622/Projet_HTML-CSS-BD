<?php

class countries extends controller
{
    var $countrie;
    var $region;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('countrie');
        $this->loadModel('region');
        $this->region = $this->models['region'];
        $this->countrie = $this->models['countrie'];
    }

    public function index(): void
    {
        $d = [];
        $d['countries'] = $this->countrie->getAllcountries();
        $this->set($d);
        $this->render('index');
    }

    public function admin_index(): void
    {
        if ($this->Session->isLogged()) {
            $d = [];
            $d['countries'] = $this->countrie->getAllcountries();
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['countries'] = $this->countrie->getAllcountries();
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }

    public function admin_edit($id = null): void
    {
        if ($this->Session->isLogged()) {
            if (!empty($_POST)) {
                if ($this->countrie->savecountrie($_POST)) {
                    $this->Session->setFlash(" action effectue  ", '<i class="fas fa-check"></i>', "success");
                } else {
                    $this->Session->setFlash("action non effectue  ", '<i class="fas fa-times"></i>', "success");
                }
                $d = [];
                $d['countries'] = $this->countrie->getAllcountries();
                $this->set($d);
                $this->layout = 'admin';
                $this->render('admin_index');
            } else {
                $d = [];
                if (!empty($id)) {
                    $d['countrie'] = $this->countrie->getcountrie($id);
                }
                $d['regions']= $this->region->getAllRegions();
                $this->set($d);
                $this->layout = 'admin';
                $this->render('admin_form');
            }
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['countries'] = $this->countrie->getAllcountries();
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }

    public function admin_delete($id): void
    {
        if ($this->Session->isLogged()) {
            if ($this->countrie->deletecountrie($id)) {
                $this->Session->setFlash("supression bien effectue ", '<i class="fas fa-check"></i>', "success");
            } else {
                $this->Session->setFlash("supression pas ", '<i class="fas fa-times"></i>', "success");
            }
            $d = [];
            $d['countries'] = $this->countrie->getAllcountries();
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['countries'] = $this->countrie->getAllcountries();
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }


}
