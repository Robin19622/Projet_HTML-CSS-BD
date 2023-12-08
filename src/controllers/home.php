<?php
class home extends controller
{
    var $employee;
    var $departement;
    var $countrie;
    var $job;
    var $location;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('employee');
        $this->loadModel('departement');
        $this->loadModel('job');
        $this->loadModel('countrie');
        $this->loadModel('location');
        $this->job = $this->models['job'];
        $this->employee = $this->models['employee'];
        $this->departement = $this->models['departement'];
        $this->countrie = $this->models['countrie'];
        $this->location = $this->models['location'];
    }

    public function index()
    {
        $d = [];
        $d['count_employees'] = $this->employee->getTotalEmployees();
        var_dump($d['count_employees']);
        $departmentCounts = $this->departement->getDepartmentEmployeeCounts();
        $d['departmentCounts'] = $departmentCounts;
        $d['hiresByDate'] = $this->employee->getHiresByDate();
        $d['count_countries'] = $this->countrie->countAllCountries();
        $d['count_locations'] = $this->location->countAllLocations();
        $this->set($d);
        $this->render('index');
    }


}
