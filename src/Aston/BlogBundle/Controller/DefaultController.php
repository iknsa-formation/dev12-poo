<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 18/07/2017
 * Time: 12:28
 */

namespace Aston\BlogBundle\Controller;


use Aston\app\Request;
use Aston\BlogBundle\Entity\Article;
use Aston\BlogBundle\Repository\ArticleRepository;

class DefaultController
{
    public function indexAction(Request $request)
    {
        $articleRepo = new ArticleRepository();

        $articles = $articleRepo->getAllArticle();
        $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views');
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
            $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views');
            $twig = new \Twig_Environment($loader);
            echo $twig->render('add.html', array('name' => 'Fabien'));
        }
    }

    public function updateAction(Request $request)
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views');
        $twig = new \Twig_Environment($loader);
        echo $twig->render('edit.html', array('name' => 'Fabien'));
    }

    public function deleteAction(Request $request)
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views');
        $twig = new \Twig_Environment($loader);
        echo $twig->render('edit.html', array('name' => 'Fabien'));
    }
}