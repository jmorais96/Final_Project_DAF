<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 31-12-2018
 * Time: 1:47
 */

namespace App\Controller\Question;


use App\Controller\UserManagement\OAuth2\AuthenticatedControllerInterface;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerMethods;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DeleteQuestionController extends AbstractController implements AuthenticatedControllerInterface
{
    use AuthenticatedControllerMethods;

    private $handler;

    public function __construct(DeleteQuestionController $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @Route("/question/delete")
     * @throws \Exception
     */
    public function delete()
    {

        $command = new DeleteQuestionController($title = filter_var($_POST['questionID'], FILTER_SANITIZE_STRING));
        $this->handler->handle($command);

        return new Response(json_encode($this->handler->handle($command) ), 200, ['content-type' => 'application/json']);
    }
}