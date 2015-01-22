<?php

require_once __DIR__.'/../vendor/autoload.php';

Symfony\Component\Debug\Debug::enable();

$app = Thatzad\Application::bootstrap();

require __DIR__.'/../config/dev.php';
require __DIR__ . '/../src/routes.php';

$app->run();
