<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 18/07/2017
 * Time: 11:21
 */

namespace Aston\app;


class Router
{
    private $routes = [];
    private $routeName = "";
    private $routeDetails = [];

    public function __construct()
    {
            $this->setRoutes();
    }
    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @return array
     */
    public function setRoutes()
    {
        $this->routes = json_decode(file_get_contents("app/routing.json"), true);
        dump($this->routes);
        return $this;
    }

    public function getRoute(Request $request)
    {
        foreach ($this->routes as $routeName => $routeDetails) {
            if($request->getGet()["route"] === $routeName) {
                $this->routeName = $routeName;
                $this->routeDetails = $routeDetails;
                break;
            }
        }
        return [
            "routeName" => $this->routeName,
            "routeDetails" => $this->routeDetails
        ];
    }


}