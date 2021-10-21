<?php

namespace MVC\Courses\Controller;

use MVC\Courses\Entity\Course;
use MVC\Courses\Helper\FlashMessageTrait;
use MVC\Courses\Infra\EntityManagerCreator;

class Delete implements InterfaceControllerRequest
{
    use FlashMessageTrait;

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processRequest(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if(is_null($id) || $id === false){
            $this->defineMessage('danger', 'This course does not exist');
            header('Location: /courses-list');
            return;
        }

        $course = $this->entityManager->getReference(Course::class, $id);
        $this->entityManager->remove($course);
        $this->entityManager->flush();

        $this->defineMessage('success', 'Course successfully deleted');

        header('Location: /courses-list');
    }
}