<?php
class Model
{
    public $id;
    public $table;
    public $conf = "default";
    public $db;
    // read : un select sur clé primaire 

    function __construct()
    {
        $conf = conf::$databases[$this->conf];
        // on fait appel a notre configuration par defaut 
        try {
            //new PDO instancie un objet en $dbh
            //ce constructeur attend 3 paramètres : serveur/bdd, user , mot de passe
            $this->db = new PDO(
                'mysql:host=' . $conf['host'] . ';dbname=' . $conf['database'],
                $conf['public'],
                $conf['password'],
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                )
            );
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    function read($fields = null)
    {
        if ($fields == null) {
            $fields = "*";
        }
        /* Exécute une requete préparée en passant un tableau de valeur*/
        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table . ' WHERE id= :id';

        $sth = $this->db->prepare($sql);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            $data = $sth->fetch(PDO::FETCH_OBJ);

            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
            // return $data;
        } else {
            echo "<br/> erreur SQL";
        }
    }
    function find($data)
    {

        $fields = "*";
        $inner = " ";
        $union = " ";
        $condition = "1=1";
        $order = "id";
        $limit = " ";
        if (isset($data['fields'])) {
            $fields = $data['fields'];
        }
        if (isset($data['inner'])) {
            $inner = $data['inner'];
        }
        if (isset($data['union'])) {
            $union = $data['union'];
        }
        if (isset($data['condition'])) {
            $condition = $data['condition'];
        }
        if (isset($data['order'])) {
            $order = $data['order'];
        }
        if (isset($data['limit'])) {
            $limit = $data['limit'];
        }
        /* Exécute une requete préparée en passant un tableau de valeur*/
        $sql = 'SELECT ' . $fields .
            ' FROM ' . $this->table .
            '  ' . $inner .
            ' Where ' . $condition .
            ' ' . $union .
            ' Order BY ' . $order .
            ' ' . $limit;

        $stmt = $this->db->prepare($sql);
        echo $sql;
        if ($stmt->execute()) {
            $data = $stmt->fetchall(PDO::FETCH_OBJ);
            return $data;
        } else {
            echo "<br/> erreur SQL";
        }
    }
    function findFirst($data)
    {
        return current($this->find($data));
    }
    function delete($data)
    {
        $condition = "1=1";
        if (isset($data['condition'])) {
            $condition = $data['condition'];
        }
        $sql = 'DELETE FROM ' . $this->table;
        $sql .= ' Where ' . $condition;
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            echo "<br/> erreur SQL";
        }
    }

    function save($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = strip_tags($data[$key], conf::$tags);
        }

        if (empty($data['id'])) {
            unset($data["id"]);
            $sql = 'Insert into ' . $this->table . ' ( ';
            $values = "";
            foreach ($data as $key => $value) {
                $sql .= $key . ",";
                $values .= ":" . $key . ",";
            }
            $sql = substr($sql, 0, -1);
            $values = substr($values, 0, -1);
            $sql .= ") Values ( " . $values . ");";


            $sth = $this->db->prepare($sql);

            if ($sth->execute($data)) {

                $this->id = $this->db->lastinsertid();
                return true;
            }
            return false;
        } else {
            $this->id = $data['id'];
            unset($data['id']);
            //UPDATE `categorie` SET `name` = 'uhzw', `ordre` = '4' WHERE `categorie`.`id` = 8;
            $sql = 'Update ' . $this->table . ' Set  ';

            foreach ($data as $key => $value) {
                $sql .= $key . "= :" . $key . ",";
            }
            $sql = substr($sql, 0, -1);

            $sql .= ' Where id =' . $this->id . ';';


            $sth = $this->db->prepare($sql);
            if ($sth->execute($data)) {
                return true;
            }
            return false;
        }
    }
}
