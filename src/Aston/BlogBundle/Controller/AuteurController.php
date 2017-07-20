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
use Romenys\Http\Response\JsonResponse;

class AuteurController
{
    public function listAction(Request $request)
    {
        $auteurRepo = new AuteurRepository();
        $auteurs = $auteurRepo->listAuteurs();
        return new JsonResponse([
            "success" => true,
            "message" => "L'utilisateur a bien été modifié",
            "auteurs" => $auteurs
        ]);
    }

    public function editAction(Request $request)
    {
        $auteurRepo = new AuteurRepository();
        if(isset($request->getGet()["origin"]) && $request->getGet()["origin"] === "default") {
            $auteur = $auteurRepo->getAuteurById($request->getGet()["id"]);
            return new JsonResponse([
                "success" => true,
                "message" => "L'utilisateur a bien été modifié",
                "auteur" => $auteur
            ]);
        } else if(isset($request->getGet()["nom"])) {
            $data_get = $request->getGet();
            $data = array(
                "nom" => $data_get["nom"],
                "prenom" => $data_get["prenom"],
                "fonction" => $data_get["fonction"]
            );
            $auteur = new Auteur($data);
            $auteurRepo->updateAuteur($auteur, $request->getGet()["id"]);
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
        }
    }

    public function showAction(Request $request)
    {
        $auteurRepo = new AuteurRepository();
        if(isset($request->getGet()["origin"]) && $request->getGet()["origin"] === "default") {
            $auteur = $auteurRepo->getAuteurById($request->getGet()["id"]);
            return new JsonResponse([
                "success" => true,
                "message" => "L'utilisateur a bien été modifié",
                "auteur" => $auteur
            ]);
        }
    }

    public function deleteAction(Request $request)
    {
        echo "suppression d'un auteur";
    }
}