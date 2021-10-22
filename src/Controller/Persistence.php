<?php

namespace MVC\Courses\Controller;

use Doctrine\ORM\EntityManagerInterface;
use MVC\Courses\Entity\Course;
use MVC\Courses\Helper\FlashMessageTrait;
use MVC\Courses\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistence implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

        $course = new Course();
        $course->setDescription($description);

        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if(!is_null($id) && $id !== false){
            $course = $this->entityManager->find(Course::class, $id);
            $course->setDescription($description);
            $this->defineMessage('success', 'Course updated successfully');
        } else {
            $course = new Course();
            $course->setDescription($description);
            $this->entityManager->persist($course);
            $this->defineMessage('success', 'Course insert successfully');
        }
        $this->entityManager->flush();

        return new Response(302, ['Location' => '/courses-list']);
    }
}