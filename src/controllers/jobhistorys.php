<?php

class jobhistorys extends controller
{
    var $jobhistory;
    var $job;

    var $department;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('jobhistory');
        $this->loadModel('job');
        $this->loadModel('departement');
        $this->job = $this->models['job'];
        $this->jobhistory = $this->models['jobhistory'];
        $this->department = $this->models['departement'];
    }

    public function index(): void
    {
        $d = [];
        $d['jobhistorys'] = $this->jobhistory->getAlljobhistorys();
        $this->set($d);
        $this->render('index');
    }

    public function admin_index(): void
    {
        if ($this->Session->isLogged()) {
            $d = [];
            $d['jobhistorys'] = $this->jobhistory->getAlljobhistorys();
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $this->layout = 'default';
            $this->render('index');
        }
    }

    public function admin_edit($id = null): void
    {
        if ($this->Session->isLogged()) {
            if (!empty($_POST)) {
                if ($this->jobhistory->savejobhistory($_POST)) {
                    $this->Session->setFlash(" action effectue  ", '<i class="fas fa-check"></i>', "success");
                } else {
                    $this->Session->setFlash("action non effectue  ", '<i class="fas fa-times"></i>', "success");
                }
                $d = [];
                $d['jobhistorys'] = $this->jobhistory->getAlljobhistorys();
                $this->set($d);
                $this->layout = 'admin';
                $this->render('admin_index');
            } else {
                $d = [];
                if (!empty($id)) {
                    $d['jobhistory'] = $this->jobhistory->getjobhistory($id);
                }
                $d['jobs']= $this->job->getAlljobs();
                $d['departements']= $this->department->getAllDepartment();
                $this->set($d);
                $this->layout = 'admin';
                $this->render('admin_form');
            }
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $this->layout = 'default';
            $this->render('index');
        }
    }

    public function admin_delete($id): void
    {
        if ($this->Session->isLogged()) {
            if ($this->jobhistory->deletejobhistory($id)) {
                $this->Session->setFlash("supression bien effectue ", '<i class="fas fa-check"></i>', "success");
            } else {
                $this->Session->setFlash("supression pas ", '<i class="fas fa-times"></i>', "success");
            }
            $d = [];
            $d['jobhistorys'] = $this->jobhistory->getAlljobhistorys();
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $this->layout = 'default';
            $this->render('index');
        }
    }


}
