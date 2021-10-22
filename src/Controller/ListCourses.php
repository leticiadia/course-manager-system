<?php

namespace MVC\Courses\Controller;

use Doctrine\ORM\EntityManagerInterface;
use MVC\Courses\Entity\Course;
use MVC\Courses\Helper\RenderHTMLTrait;
use MVC\Courses\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListCourses implements RequestHandlerInterface
{
    use RenderHTMLTrait;

    private $courseRepository;
    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->courseRepository = $entityManager->getRepository(Course::class);
    }
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderHTML('courses/list-courses.php', [
            'courses' => $this->courseRepository->findAll(), 
            'title' => 'List Courses'
        ]);

        return new Response(200, [], $html);
    }
}