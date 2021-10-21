<?php 

namespace MVC\Courses\Controller;

use MVC\Courses\Helper\RenderHTMLTrait;

class LoginForm implements InterfaceControllerRequest
{
    use RenderHTMLTrait;
    
    public function processRequest(): void
    {
        echo $this->renderHTML('login/form.php', [
            'title' => 'Login'
        ]);
    }
}