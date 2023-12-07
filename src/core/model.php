<?php

/**
 * Classe Model
 *
 * Cette classe est le modèle de base pour l'application. Elle fournit des méthodes pour lire, trouver, supprimer et sauvegarder des données dans la base de données.
 */
class Model
{
    /**
     * @var mixed $id
     * L'identifiant de l'objet.
     */
    public $id;

    /**
     * @var string $table
     * Le nom de la table dans la base de données.
     */
    public $table;

    /**
     * @var string $conf
     * Le nom de la configuration de la base de données à utiliser.
     */
    public $conf = "default";

    /**
     * @var PDO $db
     * L'objet PDO pour la connexion à la base de données.
     */
    public $db;

    /**
     * Le constructeur de la classe. Il initialise la connexion à la base de données.
     */
    function __construct()
    {
        $conf = conf::$databases[$this->conf];
        try {
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

    /**
     * Lit une entrée de la base de données en fonction de l'identifiant de l'objet.
     *
     * @param string|null $fields Les champs à lire. Si null, tous les champs sont lus.
     */
    function read($fields = null)
    {
        if ($fields == null) {
            $fields = "*";
        }
        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table . ' WHERE id= :id';

        $sth = $this->db->prepare($sql);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            $data = $sth->fetch(PDO::FETCH_OBJ);

            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
        } else {
            echo "<br/> erreur SQL";
        }
    }

    /**
     * Trouve des entrées dans la base de données en fonction des critères spécifiés.
     *
     * @param array $data Les critères de recherche.
     * @return array Les entrées trouvées.
     */
    function find($data)
    {
        $fields = "*";
        $inner = " ";
        $union = " ";
        $group = " ";
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
        if (isset($data['group'])) {
            $group = $data['group'];
        }
        $sql = 'SELECT ' . $fields .
            ' FROM ' . $this->table .
            '  ' . $inner .
            ' Where ' . $condition .
            ' ' . $union .
            ' ' . $group .
            ' Order BY ' . $order .
            ' ' . $limit;

        $stmt = $this->db->prepare($sql);
        echo($sql);
        if ($stmt->execute()) {
            $data = $stmt->fetchall(PDO::FETCH_OBJ);
            return $data;
        } else {
            echo "<br/> erreur SQL";
        }
    }

    /**
     * Trouve la première entrée dans la base de données qui correspond aux critères spécifiés.
     *
     * @param array $data Les critères de recherche.
     * @return object La première entrée trouvée.
     */
    function findFirst($data)
    {
        return current($this->find($data));
    }

    /**
     * Supprime des entrées de la base de données en fonction des critères spécifiés.
     *
     * @param array $data Les critères de suppression.
     * @return bool True si la suppression a réussi, false sinon.
     */
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

    /**
     * Sauvegarde une entrée dans la base de données. Si l'identifiant de l'objet est défini, l'entrée existante est mise à jour. Sinon, une nouvelle entrée est créée.
     *
     * @param array $data Les données à sauvegarder.
     * @return bool True si la sauvegarde a réussi, false sinon.
     */
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