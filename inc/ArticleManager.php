<?php 
class ArticleManager {

    private $db;

    public function setDb($db) {
        $this->db = $db;
    }

    public function getDb() {
        return $this->db;
    }

    public function __construct($db) {
        $this->setDb($db);
    }

    public function getAllArticle() {

        $sql = "SELECT * FROM article";
        $st = $this->db->prepare($sql);
        $st->execute();

        var_dump($st);
        return $st;
    }
}