<?php

namespace MVC\Courses\Controller;

use MVC\Courses\Helper\RenderHTMLTrait;

class InsertIntoForm implements InterfaceControllerRequest
{
    use RenderHTMLTrait;
    
    public function processRequest(): void
    {
        echo $this->renderHTML('courses/form.php', [
            'title' => 'New Course'
        ]); 
    }
}