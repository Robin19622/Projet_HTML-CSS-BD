<?php

class locations extends controller
{
    var $location;
    var $countrie;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('location');
        $this->loadModel('countrie');
        $this->countrie = $this->models['countrie'];
        $this->location = $this->models['location'];
    }

    public function index(): void
    {
        $d = [];
        $d['locations'] = $this->location->getAlllocations();
        $this->set($d);
        $this->render('index');
    }

    public function admin_index(): void
    {
        if ($this->Session->isLogged()) {
            $d = [];
            $d['locations'] = $this->location->getAlllocations();
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['locations'] = $this->location->getAlllocations();
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }

    public function admin_edit($id = null): void
    {
        if ($this->Session->isLogged()) {
            if (!empty($_POST)) {
                if ($this->location->savelocation($_POST)) {
                    $this->Session->setFlash(" action effectue  ", '<i class="fas fa-check"></i>', "success");
                } else {
                    $this->Session->setFlash("action non effectue  ", '<i class="fas fa-times"></i>', "success");
                }
                $d = [];
                $d['locations'] = $this->location->getAlllocations();
                $this->set($d);
                $this->layout = 'admin';
                $this->render('admin_index');
            } else {
                $d = [];
                if (!empty($id)) {
                    $d['location'] = $this->location->getlocation($id);
                }
                $d['countries']= $this->countrie->getAllcountries();
                $this->set($d);
                $this->layout = 'admin';
                $this->render('admin_form');
            }
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['locations'] = $this->location->getAlllocations();
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }

    public function admin_delete($id): void
    {
        if ($this->Session->isLogged()) {
            if ($this->location->deletelocation($id)) {
                $this->Session->setFlash("supression bien effectue ", '<i class="fas fa-check"></i>', "success");
            } else {
                $this->Session->setFlash("supression pas ", '<i class="fas fa-times"></i>', "success");
            }
            $d = [];
            $d['locations'] = $this->location->getAlllocations();
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['locations'] = $this->location->getAlllocations();
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }


}
