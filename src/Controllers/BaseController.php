<?php namespace Thatzad\Controllers;

use Silex\Application;

abstract class BaseController
{
    protected function viewMake($name, array $data = [])
    {
        $app = new Application();
        return $app['twig']->render($name . '.html.twig', $data);
    }
}
