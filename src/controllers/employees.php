<?php

class employees extends controller
{
    var mixed $employee;
    var mixed $department;
    var mixed $job;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('employee');
        $this->loadModel('departement');
        $this->loadModel('job');
        $this->job = $this->models['job'];
        $this->employee = $this->models['employee'];
        $this->department = $this->models['departement'];
    }

    public function index(): void
    {
        $d = [];
        $d['employees'] = $this->employee->getLast(999);
        $this->set($d);
        $this->render('index');
    }

    public function admin_index(): void
    {
        if ($this->Session->isLogged()) {
            $d = [];
            $d['employees'] = $this->employee->getAllManagers(10);
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['employees'] = $this->employee->getLast(999);
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }

    public function admin_edit( $id = null ): void
    {
        if ($this->Session->isLogged()) {
            if (!empty($_POST)) {
                if ($this->employee->saveEmployee($_POST)) {
                    $this->Session->setFlash(" action effectue  ", '<i class="fas fa-check"></i>', "success");
                } else {
                    $this->Session->setFlash("action non effectue  ", '<i class="fas fa-times"></i>', "success");
                }
                $d = [];
                $d['employees'] = $this->employee->getLast(999);
                $this->set($d);
                $this->layout = 'admin';
                $this->render('admin_index');
            } else {
                $d = [];
                if (!empty($id)) {
                    $d['employee'] = $this->employee->getEmployee($id);
                }
                $d['managers']= $this->employee->getAllManagers();
                $d['departments'] = $this->department->getAllDepartment();
                $d['jobs'] = $this->job->getAllJobs();
                $this->set($d);
                $this->layout = 'admin';
                $this->render('admin_form');
            }
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['employees'] = $this->employee->getLast(999);
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }

    public function admin_delete(int $id): void
    {
        if ($this->Session->isLogged()) {
            if ($this->employee->deleteEmployee($id)) {
                $this->Session->setFlash("supression bien effectue ", '<i class="fas fa-check"></i>', "success");
            } else {
                $this->Session->setFlash("supression pas ", '<i class="fas fa-times"></i>', "success");
            }
            $d = [];
            $d['employees'] = $this->employee->getLast(999);
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['employees'] = $this->employee->getLast(999);
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }

    public function info_form(int $id): void
    {
        if ($this->Session->isLogged()) {
            $d = [];
            $d['employee'] = $this->employee->getEmployee($id);
            $d['job'] = $this->job->getJob($d['employee']->JOB_ID);
            $d['department'] = $this->department->getdepartement($d['employee']->DEPARTMENT_ID);
            $this->set($d);
            $this->layout = 'admin';
            $this->render('info_form');
        } else {
            $this->Session->setFlash("Appli impiratable " . $_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $d = [];
            $d['employees'] = $this->employee->getLast(999);
            $this->set($d);
            $this->layout = 'default';
            $this->render('index');
        }
    }
}
