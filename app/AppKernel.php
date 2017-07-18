<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 18/07/2017
 * Time: 10:52
 */

namespace Aston\app;


class AppKernel
{
    public function __construct()
    {
        if(!isset($_GET["route"]) || $_GET["route"] === "") {
            $_GET["route"] = "default";
        }

        $request = new Request($_GET, $_POST);
        $route = (new Router())->getRoute($request);

        $controller = $route['routeDetails']["controller"] ."Controller";
        $action = $route['routeDetails']["action"] . "Action";

        (new $controller)->$action($request);
    }
}