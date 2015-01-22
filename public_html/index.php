<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = Thatzad\Application::bootstrap();

require __DIR__.'/../config/prod.php';
require __DIR__ . '/../src/routes.php';

$app->run();
