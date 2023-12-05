<?php

class employees extends controller
{
    var $employee;
    var $department;

    var $job;

    function __construct()
    {
        parent::__construct();
        $this->loadModel('employee');
        $this->loadModel('department');
        $this->loadModel('job');
        $this->job = $this->models['job'];
        $this->employee = $this->models['employee'];
        $this->department = $this->models['department'];
    }

    function index(): void
    {
        $d = [];
        $d['employees'] = $this->employee->getLast(999);
        $this->set($d);
        $this->render('index');
    }

    function admin_index(): void
    {
        if ($this->Session->isLogged()) {
            $d = [];
            $d['employees'] = $this->employee->getLast(10);
            $this->set($d);
            $this->layout = 'admin';
            $this->render('admin_index');
        } else {
            $this->Session->setFlash("Appli impiratable ".$_SERVER['REMOTE_ADDR'], '<i class="fas fa-times"></i>', "danger");
            $this->layout = 'default';
            $this->render('index');
        }
    }

    function admin_edit($id = null): void
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
                $d = [];
                $d['employees'] = $this->employee->getLast(10);
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
            $this->layout = 'default';
            $this->render('index');
        }
    }

    function admin_delete($id): void
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
            $this->layout = 'default';
            $this->render('index');
        }
    }
}
