<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 17-12-2018
 * Time: 1:42
 */

namespace App\Controller\UserManagement;


use App\Application\UserManagement\CreateUserCommand;
use App\Application\UserManagement\CreateUserHandler;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerMethods;
use App\Domain\UserManagement\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class UserCreateController extends AbstractController
{
    use AuthenticatedControllerMethods;

    private $handler;

    public function __construct(CreateUserHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @Route("/users/add")
     * @throws \Exception
     */
    public function create()
    {
        $email = new User\Email(filter_var($_POST['email'], FILTER_SANITIZE_STRING));
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

        $command = new CreateUserCommand( $name, $email);

        $this->withCurrentUser($this->handler->handle($command));

        return new Response(json_encode("user Created"), 200, ['content-type' => 'application/json']);
    }

}