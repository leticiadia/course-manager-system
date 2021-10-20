<?php

use MVC\Courses\Controller\InsertIntoForm;
use MVC\Courses\Controller\ListCourses;
use MVC\Courses\Controller\Persistence;

return [
    '/courses-list' => ListCourses::class,
    '/new-course' => InsertIntoForm::class,
    '/save-course' => Persistence::class
];
