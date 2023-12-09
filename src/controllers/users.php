<?php
class users extends controller
{
    var $employee;
    var $departement;
    var $countrie;
    var $job;
    var $location;
    var mixed $user;
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('user');
        $this->loadModel('employee');
        $this->loadModel('departement');
        $this->loadModel('job');
        $this->loadModel('countrie');
        $this->loadModel('location');
        $this->user = $this->models['user'];
        $this->job = $this->models['job'];
        $this->employee = $this->models['employee'];
        $this->departement = $this->models['departement'];
        $this->countrie = $this->models['countrie'];
        $this->location = $this->models['location'];
    }

    public function index(): void
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
            $d = [];
            $d['count_employees'] = $this->employee->getTotalEmployees();
            $departmentCounts = $this->departement->getDepartmentEmployeeCounts();
            $d['departmentCounts'] = $departmentCounts;
            $d['hiresByDate'] = $this->employee->getHiresByDate();
            $d['count_countries'] = $this->countrie->countAllCountries();
            $d['count_locations'] = $this->location->countAllLocations();
            $this->set($d);
            $this->render('loginok');
        } else {

            $this->render('index');
        }
    }
    public function logout(): void
    {
        unset($_SESSION['User']);
        $this->layout = 'default';
        $this->render('index');
    }
}
