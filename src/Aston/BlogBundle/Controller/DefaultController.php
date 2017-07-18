<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 18/07/2017
 * Time: 12:28
 */

namespace Aston\BlogBundle\Controller;


use Aston\app\Request;

class DefaultController
{
    public function indexAction(Request $request)
    {
        echo "Je suis dans indexAction";
    }
}