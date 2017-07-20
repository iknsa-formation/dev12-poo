<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 20/07/2017
 * Time: 10:36
 */

namespace Aston\BlogBundle\Controller;
use Aston\BlogBundle\Entity\Auteur;
use Aston\app\Request;
use Aston\BlogBundle\Repository\AuteurRepository;

class AuteurController
{
    public function listAction(Request $request)
    {
        $auteurRepo = new AuteurRepository();
        $auteurs = $auteurRepo->listAuteurs();
        $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views/Auteur');
        $twig = new \Twig_Environment($loader);

        echo $twig->render('list_auteur.html', array('name' => 'Fabien', 'auteurs' => $auteurs));
    }

    public function editAction(Request $request)
    {
        $auteurRepo = new AuteurRepository();
        $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views/Auteur');
        $twig = new \Twig_Environment($loader);
        if(isset($request->getGet()["origin"]) && $request->getGet()["origin"] === "default") {
            $auteur = $auteurRepo->getAuteurById($request->getGet()["id"]);
            echo $twig->render('edit_auteur.html', array('name' => 'Fabien', 'auteur' => $auteur));
        } else {
            if(isset($request->getGet()["nom"])) {
                $data_get = $request->getGet();
                $data = array(
                    "nom" => $data_get["nom"],
                    "prenom" => $data_get["prenom"],
                    "fonction" => $data_get["fonction"]
                );
                $auteur = new Auteur($data);
                $auteurRepo->updateAuteur($auteur, $request->getGet()["id"]);
            }
            $this->listAction($request);
        }
    }
    public function addAction(Request $request)
    {
        $data_get = $request->getGet();
        if(isset($data_get['nom'])) {
            $data = array(
                "nom" => $data_get["nom"],
                "prenom" => $data_get["prenom"],
                "fonction" => $data_get["fonction"]
            );
            $auteur = new Auteur($data);
            $auteurRepo = new AuteurRepository();
            $auteurRepo->AddAuteur($auteur);

            $this->listAction($request);
        } else {
            $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views/Auteur');
            $twig = new \Twig_Environment($loader);
            echo $twig->render('add_auteur.html', array('name' => 'Fabien'));
        }
    }

    public function showAction(Request $request)
    {
        $auteurRepo = new AuteurRepository();
        $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views/Auteur');
        $twig = new \Twig_Environment($loader);
        if(isset($request->getGet()["origin"]) && $request->getGet()["origin"] === "default") {
            $auteur = $auteurRepo->getAuteurById($request->getGet()["id"]);
            echo $twig->render('show_auteur.html', array('name' => 'Fabien', 'auteur' => $auteur));
        }
    }

    public function deleteAction(Request $request)
    {
        echo "suppression d'un auteur";
    }
}