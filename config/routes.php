<?php

use MVC\Courses\Controller\{Delete, EditForm, InsertIntoForm, ListCourses, LoginForm, Logout, Persistence, StartLogin};

return [
    '/courses-list' => ListCourses::class,
    '/new-course' => InsertIntoForm::class,
    '/save-course' => Persistence::class,
    '/delete-course' => Delete::class,
    '/change-course' => EditForm::class,
    '/login' => LoginForm::class,
    '/start-login' => StartLogin::class,
    '/logout' => Logout::class
];
