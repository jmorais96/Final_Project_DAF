<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 31-12-2018
 * Time: 1:54
 */

namespace App\Controller\Question;


use App\Application\Question\UpdateQuestionCommand;
use App\Application\Question\UpdateQuestionHandler;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerInterface;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerMethods;
use App\Domain\UserManagement\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateQuestionController extends AbstractController implements AuthenticatedControllerInterface
{

    use AuthenticatedControllerMethods;

    private $handler;

    public function __construct(UpdateQuestionHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @Route("/question/update")
     * @throws \Exception
     */
    public function create()
    {
        $questionId = filter_var($_POST['questionId'], FILTER_SANITIZE_STRING);
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);

        $command = new UpdateQuestionCommand($questionId, $title, $body);
        $this->handler->handle($command);

        return new Response(json_encode($this->handler->handle($command) ), 200, ['content-type' => 'application/json']);
    }

}