<?php

class Parola
{
    private $id, $parola;

    function setId($id) {
        $this->id = $id;
    }

    function setParola($value) {
        $this->parola = $value;
    }

    function getId() {
        return $this->id;
    }

    function getParola() {
        return $this->parola;
    }

    public static function fetchAll($parola) {
        $conn = Parola::connector();
        $query = "SELECT * FROM parola WHERE parola LIKE :parola;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':parola', $parola, PDO::PARAM_STR);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);
        return json_encode($records);
    }

    private static function connector() {
        $db = new DbManager('localhost', 3306, 'alice', 'password');
        return $db->connect('parole5E');
    }
}