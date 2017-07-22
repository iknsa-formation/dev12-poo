<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 20/07/2017
 * Time: 10:36
 */

namespace Aston\BlogBundle\Repository;
use Aston\app\DB;
use Aston\BlogBundle\Entity\Auteur;

class AuteurRepository
{
    public function listAuteurs()
    {
        $DB = new DB();
        $sql = "SELECT * FROM auteur ORDER BY id_auteur DESC";
        $stm = $DB->getDb()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll($DB::FETCH_ASSOC);
    }

    public function AddAuteur(Auteur $auteur) {
        $DB = new DB();
        $sql = "INSERT INTO auteur (`nom`, `prenom`, `fonction`) 
                VALUES (?, ?, ?)";
        $stm = $DB->getDb()->prepare($sql);
        $stm->execute(
            array(
                $auteur->getNom(),
                $auteur->getPrenom(),
                $auteur->getFonction()
            )
        );
    }

    public function getAuteurById($id)
    {
        $DB = new DB();
        $sql = "SELECT * FROM auteur WHERE  id_auteur= ?";
        $stm = $DB->getDb()->prepare($sql);
        $stm->execute(array($id));
        $arr = $stm->fetchAll($DB::FETCH_ASSOC);
        return $arr[0];
    }

    public function updateAuteur(Auteur $auteur, $id)
    {
        $DB = new DB();
        $sql = "UPDATE auteur SET nom = ?, prenom = ?, fonction = ? WHERE id_auteur = ?";
        $stm = $DB->getDb()->prepare($sql);
        $stm->execute(
            array(
                $auteur->getNom(),
                $auteur->getPrenom(),
                $auteur->getFonction(),
                $id
            )
        );
    }

    public function deleteAuteur($id)
    {
        $DB = new DB();
        $sql = "DELETE FROM auteur WHERE id_auteur = ?";
        $stm = $DB->getDb()->prepare($sql);
        $stm->execute(array( $id ));
    }
}