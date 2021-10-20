<?php

use MVC\Courses\Controller\{Delete, EditForm, InsertIntoForm, ListCourses, Persistence};

return [
    '/courses-list' => ListCourses::class,
    '/new-course' => InsertIntoForm::class,
    '/save-course' => Persistence::class,
    '/delete-course' => Delete::class,
    '/change-course' => EditForm::class
];
