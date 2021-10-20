<?php

namespace MVC\Courses\Controller;

use MVC\Courses\Entity\Course;
use MVC\Courses\Infra\EntityManagerCreator;

class ListCourses implements InterfaceControllerRequest
{
    private $courseRepository;
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->courseRepository = $entityManager->getRepository(Course::class);
    }
    public function processRequest(): void
    {
        $courses = $this->courseRepository->findAll();
        $title = 'List Courses';
        require __DIR__ . '/../../view/courses/list-courses.php';
    }
}