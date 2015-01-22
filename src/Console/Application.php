<?php namespace Thatzad\Console;

use Symfony\Component\Console\Application as SymfonyConsoleApplication;

final class Application extends SymfonyConsoleApplication
{
    private $container;

    public function setContainer($container)
    {
        $this->container = $container;
    }

    public function getContainer()
    {
        return $this->container;
    }
}
