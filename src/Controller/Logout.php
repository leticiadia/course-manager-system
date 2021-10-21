<?php 

namespace MVC\Courses\Controller;

class Logout implements InterfaceControllerRequest
{
    public function processRequest(): void
    {
        session_destroy();
        header('Location: /login');
    }
}