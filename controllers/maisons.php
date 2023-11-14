<?php
class maisons extends controller
{
    var $models = array('maison', 'category');

    function index()
    {
        $this->render('index');
    }

    function view($id)
    {
        $d['mai'] = $this->maison->getM($id);

        $this->set($d);
        $this->render('view');
    }
    function admin_index()
    {
        if ($this->Session->isLogged()) {
            $d = array();
            $d['mais'] = $this->maison->getLast(999);
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

                if ($this->maison->savemai($_POST)) {
                    $this->Session->setFlash(" action effectue  ", '<i class="fas fa-check"></i>', "success");
                } else {
                    $this->Session->setFlash("action non effectue  ", '<i class="fas fa-times"></i>', "success");
                }
                $d = array();
                $d['mais'] = $this->maison->getLast(999);
                $this->set($d);
                $this->layout = 'admin';
                $this->render('admin_index');
            } else {
                if (!empty($id)) {
                    $d['mai'] = $this->maison->getM($id);
                    $this->set($d);
                }
                $c = array();
                $c['cats'] = $this->category->getLast(999);

                $this->set($c);
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
            if ($this->maison->deletemai($id)) {
                $this->Session->setFlash("supression bien effectue ", '<i class="fas fa-check"></i>', "success");
            } else {
                $this->Session->setFlash("supression pas ", '<i class="fas fa-times"></i>', "success");
            }
            $d = array();
            $d['mais'] = $this->maison->getLast(999);
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
