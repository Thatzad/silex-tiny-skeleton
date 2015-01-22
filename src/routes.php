<?php

use Symfony\Component\HttpFoundation\Response;

$app->get('/', function () use ($app) {
    return $app['twig']->render('home.html.twig');
})->bind('home');

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        throw new $e;
    }

    $templates = array(
        'errors/'.$code.'.html',
        'errors/'.substr($code, 0, 2).'x.html',
        'errors/'.substr($code, 0, 1).'xx.html',
        'errors/default.html',
    );

    return new Response(
        $app['twig']->resolveTemplate($templates)->render(array(
            'code' => $code
        )),
        $code
    );
});
