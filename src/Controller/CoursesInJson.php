<?php

namespace MVC\Courses\Controller;

use Doctrine\ORM\EntityManagerInterface;
use MVC\Courses\Entity\Course;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CoursesInJson implements RequestHandlerInterface
{

    private $courseRepository;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->courseRepository = $entityManager->getRepository(Course::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $courses = $this->courseRepository->findAll();
        return new Response(200, [], json_encode($courses));
    }
}