<?php

namespace MVC\Courses\Controller;

class InsertIntoForm implements InterfaceControllerRequest
{
    public function processRequest(): void
    {
        $title = 'New Course';
        require __DIR__ . '/../../view/courses/form.php';   
    }
}