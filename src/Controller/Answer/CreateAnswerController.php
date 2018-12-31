<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 31-12-2018
 * Time: 1:58
 */

namespace App\Controller\Answer;

use App\Application\Answer\CreateAnswerCommand;
use App\Application\Answer\CreateAnswerHandler;
use App\Application\Question\CreateQuestionCommand;
use App\Application\Question\CreateQuestionHandler;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerInterface;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerMethods;
use App\Domain\UserManagement\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateAnswerController extends AbstractController implements AuthenticatedControllerInterface
{
    use AuthenticatedControllerMethods;

    private $handler;

    public function __construct(CreateAnswerHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @Route("/answer/add")
     * @throws \Exception
     */
    public function create()
    {
        $questionId = filter_var($_POST['questionId'], FILTER_SANITIZE_STRING);
        $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);


        $command = new CreateAnswerCommand($this->currentUser(), $body, $questionId );
        $this->handler->handle($command);

        return new Response(json_encode($this->handler->handle($command) ), 200, ['content-type' => 'application/json']);
    }
}