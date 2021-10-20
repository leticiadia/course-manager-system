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
        $course = new Course();
        $course->setDescription($_POST['description']);

        $this->entityManager->persist($course);
        $this->entityManager->flush();   
    }
}