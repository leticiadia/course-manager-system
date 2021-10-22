<?php

namespace MVC\Courses\Controller;

use Doctrine\ORM\EntityManagerInterface;
use MVC\Courses\Entity\User;
use MVC\Courses\Helper\FlashMessageTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class StartLogin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $usersRepository;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->usersRepository = $entityManager->getRepository(User::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if(is_null($email) || $email === false){
            $this->defineMessage('danger', 'The email you entered is not a valid email address');
            header('Location: /login');
            exit();
        }

        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        /** @var User $user */
        $user = $this->usersRepository->findOneBy(['email' => $email]);

        if(is_null($user) || !$user->passwordIsCorrect($password)){
            $this->defineMessage('danger', 'Email or password invalid');
            header('Location: /login');
            exit();
        }

        $_SESSION['logged'] = true;

        return new Response(200, ['Location' => '/courses-list']); 
    }
}