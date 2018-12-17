<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 17-12-2018
 * Time: 0:23
 */

namespace App\Controller\Question;


use App\Application\Question\CreateQuestionCommand;
use App\Application\Question\CreateQuestionHandler;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerInterface;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerMethods;
use App\Domain\UserManagement\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateQuestionController extends AbstractController implements AuthenticatedControllerInterface
{

    use AuthenticatedControllerMethods;

    private $handler;

    public function __construct(CreateQuestionHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @Route("/question/add")
     * @throws \Exception
     */
    public function create()
    {
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);
        if (isset($_POST['tags'])){
            $tags = explode(",",filter_var($_POST['tags'], FILTER_SANITIZE_STRING));
        }

       /* $mail = new User\Email('john.doe@example.com');
        $user = new User("test", $mail);*/

        $command = new CreateQuestionCommand($this->currentUser(), $title, $body, $tags );
        $this->handler->handle($command);

        return new Response(json_encode($this->handler->handle($command) ), 200, ['content-type' => 'application/json']);
    }
}