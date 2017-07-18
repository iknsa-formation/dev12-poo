<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 18/07/2017
 * Time: 12:28
 */

namespace Aston\BlogBundle\Controller;


use Aston\app\Request;
use Aston\app\DB;

class DefaultController
{
    public function indexAction(Request $request)
    {
        $DB = new DB();

        $sql = "SELECT * FROM article";
        $stm = $DB->getDb()->prepare($sql);
        $stm->execute();

        dump($stm->fetchAll());

        $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../Resources/views');
        $twig = new \Twig_Environment($loader);

        echo $twig->render('default.html', array('name' => 'Fabien'));
    }
}