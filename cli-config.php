<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use MVC\Courses\Infra\EntityManagerCreator;

require_once 'vendor/autoload.php';

return ConsoleRunner::createHelperSet(
    (new EntityManagerCreator())->getEntityManager()
);
