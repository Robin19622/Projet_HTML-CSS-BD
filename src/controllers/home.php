<?php
class home extends controller
{
    var $employee;
    var $departement;

    var $job;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('employee');
        $this->loadModel('departement');
        $this->loadModel('job');
        $this->job = $this->models['job'];
        $this->employee = $this->models['employee'];
        $this->departement = $this->models['departement'];
    }

    public function index()
    {
        $d = [];
        $d['count_employees'] = $this->employee->getTotalEmployees();
        var_dump($d['count_employees']);
        $departmentCounts = $this->departement->getDepartmentEmployeeCounts();
        $d['departmentCounts'] = $departmentCounts;
        $this->set($d);
        $this->render('index');
    }


}
