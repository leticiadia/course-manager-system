<?php

namespace MVC\Courses\Controller;

use MVC\Courses\Entity\Course;
use MVC\Courses\Infra\EntityManagerCreator;

class ListCourses extends ControllerWithHTML implements InterfaceControllerRequest
{
    private $courseRepository;
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->courseRepository = $entityManager->getRepository(Course::class);
    }
    public function processRequest(): void
    {
        echo $this->renderHTML('courses/list-courses.php', [
            'courses' => $this->courseRepository->findAll(),
            'title' => 'List Courses'
        ]);
    }
}