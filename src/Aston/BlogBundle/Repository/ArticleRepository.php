<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 19/07/2017
 * Time: 10:53
 */

namespace Aston\BlogBundle\Repository;
use Aston\app\DB;
use Aston\BlogBundle\Entity\Article;

class ArticleRepository
{
    public function getAllArticle()
    {
        $DB = new DB();
        $sql = "SELECT * FROM article";
        $stm = $DB->getDb()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll($DB::FETCH_ASSOC);
    }

    public function AddArticle(Article $article) {
        $DB = new DB();
        $sql = "INSERT INTO article (`titre`, `date`, `auteur`, `message`) 
                VALUES (?, NOW(), ?, ?)";
        $stm = $DB->getDb()->prepare($sql);
        $stm->execute(
            array(
                $article->getTitre(),
                $article->getAuteur(),
                $article->getMessage()
            )
        );
    }
}