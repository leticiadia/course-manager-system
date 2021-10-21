<?php 

namespace MVC\Courses\Controller;

class LoginForm extends ControllerWithHTML implements InterfaceControllerRequest
{
    public function processRequest(): void
    {
        echo $this->renderHTML('login/form.php', [
            'title' => 'Login'
        ]);
    }
}