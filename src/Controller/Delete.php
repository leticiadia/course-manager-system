<?php

namespace MVC\Courses\Controller;

use MVC\Courses\Entity\Course;
use MVC\Courses\Helper\FlashMessageTrait;
use MVC\Courses\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Delete implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $response = new Response(302, ['Location' => '/courses-list']);
        if(is_null($id) || $id === false){
            $this->defineMessage('danger', 'This course does not exist');
            header('Location: /courses-list');
            return $response;
        }

        $course = $this->entityManager->getReference(Course::class, $id);
        
        $this->entityManager->remove($course);
        $this->entityManager->flush();
        $this->defineMessage('success', 'Course successfully deleted');  

        return $response;
    }
}