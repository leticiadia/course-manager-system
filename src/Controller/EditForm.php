<?php

namespace MVC\Courses\Controller;

use MVC\Courses\Entity\Course;
use MVC\Courses\Helper\RenderHTMLTrait;
use MVC\Courses\Infra\EntityManagerCreator;

class EditForm implements InterfaceControllerRequest
{
    use RenderHTMLTrait;
    
    private $courseRepository;
    
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->courseRepository = $entityManager->getRepository(Course::class);
    }

    public function processRequest(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if(is_null($id) || $id === false){
            header('Location: /change-course');
            return;
        }

        $course = $this->courseRepository->find($id);
        echo $this->renderHTML('courses/form.php', [
            'course' => $course,
            'title' => 'Change course: ' . $course->getDescription()
        ]);
    }
}