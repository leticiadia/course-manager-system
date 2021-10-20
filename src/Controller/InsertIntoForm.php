<?php

namespace MVC\Courses\Controller;

class InsertIntoForm extends ControllerWithHTML implements InterfaceControllerRequest
{
    public function processRequest(): void
    {
        echo $this->renderHTML('courses/form.php', [
            'title' => 'New Course'
        ]); 
    }
}