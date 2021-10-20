<?php

namespace MVC\Courses\Controller;

use MVC\Courses\Entity\Course;
use MVC\Courses\Infra\EntityManagerCreator;

class Persistence implements InterfaceControllerRequest
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }
    public function processRequest(): void
    {
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

        $course = new Course();
        $course->setDescription($description);

        $this->entityManager->persist($course);
        $this->entityManager->flush();   

        header('Location: /courses-list', true, 302);
    }
}