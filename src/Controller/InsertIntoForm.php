<?php

namespace MVC\Courses\Controller;

use Doctrine\ORM\EntityManagerInterface;
use MVC\Courses\Helper\RenderHTMLTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class InsertIntoForm implements RequestHandlerInterface
{
    use RenderHTMLTrait;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderHTML('courses/form.php', ['title' => 'New Course']);
        return new Response(200, [], $html);
    }
}