<?php namespace Thatzad;

use Silex\Application as SilexApplication;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\RoutingServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

final class Application
{
    public static function bootstrap()
    {
        $app = static::registerServicesProviders(new SilexApplication());

        $app['twig'] = $app->extend('twig', function ($twig, $app) {

            $twig->addFunction(new \Twig_SimpleFunction(
                'asset', function ($asset) use ($app) {
                return $app['request_stack']
                    ->getMasterRequest()
                    ->getBasepath().'/'.$asset;
            }));

            return $twig;
        });

        return $app;
    }

    public static function registerServicesProviders(SilexApplication $app)
    {
        $app->register(new RoutingServiceProvider());
        $app->register(new ValidatorServiceProvider());
        $app->register(new ServiceControllerServiceProvider());
        $app->register(new TwigServiceProvider());
        $app->register(new HttpFragmentServiceProvider());

        return $app;
    }
}
