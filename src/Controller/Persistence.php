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

        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if(!is_null($id) && $id !== false){
            $course = $this->entityManager->find(Course::class, $id);
            $course->setDescription($description);
        } else {
            $course = new Course();
            $course->setDescription($description);
            $this->entityManager->persist($course);
        }
        $this->entityManager->flush();

        header('Location: /courses-list', true, 302);
    }
}