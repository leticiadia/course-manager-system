<?php 

namespace MVC\Courses\Controller;

use MVC\Courses\Helper\RenderHTMLTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginForm implements RequestHandlerInterface
{
    use RenderHTMLTrait;
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderHTML('login/form.php', ['title' => 'Login']);
        return new Response(200, [], $html);
    }
}