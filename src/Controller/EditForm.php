<?php

namespace MVC\Courses\Controller;

use Doctrine\ORM\EntityManagerInterface;
use MVC\Courses\Entity\Course;
use MVC\Courses\Helper\FlashMessageTrait;
use MVC\Courses\Helper\RenderHTMLTrait;
use MVC\Courses\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EditForm implements RequestHandlerInterface
{
    use RenderHTMLTrait, FlashMessageTrait;
    
    private $courseRepository;
    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->courseRepository = $entityManager->getRepository(Course::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $response = new Response(200, ['Location' => '/change-course']);  
        if(is_null($id) || $id === false){
            $this->defineMessage('danger', 'Course ID invalid');
            return $response;
        }

        $course = $this->courseRepository->find($id);

        $html = $this->renderHTML('courses/form.php', [
            'course' => $course, 
            'title' => 'Change course: ' . $course->getDescription()
        ]);

        return new Response(200, [], $html);
    }
}