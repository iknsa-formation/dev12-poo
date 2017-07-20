<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 18/07/2017
 * Time: 12:28
 */

namespace Aston\BlogBundle\Controller;

use Romenys\Http\Response\JsonResponse;
use Aston\app\Request;
use Aston\BlogBundle\Entity\Article;
use Aston\BlogBundle\Repository\ArticleRepository;

class DefaultController
{
    public function indexAction(Request $request)
    {
        $articleRepo = new ArticleRepository();
        $articles = $articleRepo->getAllArticle();
        $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views/Default');
        $twig = new \Twig_Environment($loader);

        echo $twig->render('default.html', array('name' => 'Fabien', 'articles' => $articles));
    }

    public function addAction(Request $request)
    {
        $data_get = $request->getGet();
        if(isset($data_get['titre'])) {
            $data = array(
                "titre" => $data_get["titre"],
                "auteur" => $data_get["auteur"],
                "message" => $data_get["message"]
            );
            $article = new Article($data);
            $articleRepo = new ArticleRepository();
            $articleRepo->AddArticle($article);

            $this->indexAction($request);
        } else {
            $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views/Default');
            $twig = new \Twig_Environment($loader);
            echo $twig->render('add.html', array('name' => 'Fabien'));
        }
    }

    public function updateAction(Request $request)
    {
        $articleRepo = new ArticleRepository();
        $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views/Default');
        $twig = new \Twig_Environment($loader);
        if(isset($request->getGet()["origin"]) && $request->getGet()["origin"] === "default") {
            $article = $articleRepo->getArticleById($request->getGet()["id"]);
            echo $twig->render('edit.html', array('name' => 'Fabien', 'article' => $article));
        } else {
            if(isset($request->getGet()["titre"])) {
                $data_get = $request->getGet();
                $data = array(
                    "titre" => $data_get["titre"],
                    "auteur" => $data_get["auteur"],
                    "message" => $data_get["message"]
                );
                $article = new Article($data);
                $articleRepo->updateArticle($article, $request->getGet()["id"]);
            }
            $this->indexAction($request);
        }
    }

    public function deleteAction(Request $request)
    {
        if(isset($request->getGet()["id"])) {
            $articleRepo = new ArticleRepository();
            $id = $request->getGet()["id"];
            $articleRepo->deleteArticle($id);
        }
        $this->indexAction($request);
    }

    public function showAction(Request $request)
    {
        $auteurRepo = new ArticleRepository();
        $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views/Auteur');
        $twig = new \Twig_Environment($loader);
        if(isset($request->getGet()["origin"]) && $request->getGet()["origin"] === "default") {
            $auteur = $auteurRepo->getArticleById($request->getGet()["id"]);
            echo $twig->render('show.html', array('name' => 'Fabien', 'auteur' => $auteur));
        }
    }
}
