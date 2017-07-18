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
        return $st->fetchAll();
    }

    public function getArticle($id) {

        $sql = "SELECT * FROM article WHERE id = ?";
        $st = $this->db->prepare($sql);
        $st->execute(array($id));
        return $st->fetchAll();
    }

    public function addArticle(Article $article) {
    
        if(isset($article)) {
            var_dump($article);
            $sql = "INSERT INTO article ( `titre`, `auteur`, `date`, `message`) 
            VALUES (?, ?, NOW(), ?)";
            $stm = $this->db->prepare($sql);
            $stm->execute(array($article->getTitre(), $article->getAuteur(), $article->getMessage()));
        }
    }

    public function delArticle($id) {
        if(isset($id)) {
            var_dump($id);
            $sql = "DELETE FROM article WHERE id = ?";
            $stm = $this->db->prepare($sql);
            $stm->execute(array($id));
        }
    }   
    public function updateArticle(Article $article) {
    if(isset($article)) {
        var_dump($article);
        $sql = "UPDATE article SET titre=?, auteur=?, date=NOW(), message=?";
        $stm = $this->db->prepare($sql);
        $stm->execute(array($article->getTitre(), $article->getAuteur(), $article->getMessage()));
        }
    }

}

