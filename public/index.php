<?php

require_once __DIR__ . '/../vendor/autoload.php';

use MVC\Courses\Controller\InsertIntoForm;
use MVC\Courses\Controller\ListCourses;
use MVC\Courses\Controller\Persistence;

switch($_SERVER['PATH_INFO']){
    case '/courses-list': {
        $controller = new ListCourses();
        $controller->processRequest();
        break;
    }

    case '/new-course': {
        $controller = new InsertIntoForm();
        $controller->processRequest();
        break;
    }

    case '/save-course': {
        $controller = new Persistence();
        $controller->processRequest();
        break;
    }

    default: {
        echo "Error 404";
    }
}