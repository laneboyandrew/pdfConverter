<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Silex\Application;
use Silex\Route;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Request;
use Silex\Api\ControllerProviderInterface;
class ConvertControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        // creates a new controller based on the default route
        $controllers = $app['controllers_factory'];

        $controllers->get('/', function (Application $app) {
            return "hello!!";
        });

        return $controllers;
    }
}
