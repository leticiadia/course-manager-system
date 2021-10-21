<?php

namespace MVC\Courses\Controller;

use MVC\Courses\Entity\User;
use MVC\Courses\Helper\FlashMessageTrait;
use MVC\Courses\Infra\EntityManagerCreator;

class StartLogin implements InterfaceControllerRequest
{
    use FlashMessageTrait;

    private $usersRepository;
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->usersRepository = $entityManager->getRepository(User::class);
    }

    public function processRequest(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if(is_null($email) || $email === false){
            $this->defineMessage('danger', 'The email you entered is not a valid email address');
            header('Location: /login');
            return;
        }

        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        /** @var User $user */
        $user = $this->usersRepository->findOneBy(['email' => $email]);

        if(is_null($user) || !$user->passwordIsCorrect($password)){
            $this->defineMessage('danger', 'Email or password invalid');
            header('Location: /login');
            return;
        }

        $_SESSION['logged'] = true;

        header('Location: /courses-list');
    }
}