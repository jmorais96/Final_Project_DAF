<?php

namespace spec\App\Application\Question;

use App\Application\Question\CreateQuestionCommand;
use App\Application\Question\CreateQuestionHandler;
use App\Domain\Question\Question;
use App\Domain\Question\QuestionRepository;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateQuestionHandlerSpec extends ObjectBehavior
{

    function let(QuestionRepository $repository)
    {
        $repository->add(Argument::type(Question::class))->willReturnArgument(0);
        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateQuestionHandler::class);
    }

    function it_handles_the_create_user_command(QuestionRepository $repository, User $user)
    {
        $title='title';
        $body= 'body';
        $tag = [];
        $command = new CreateQuestionCommand($user->getWrappedObject(), $title, $body, $tag);

        $question = $this->handle($command);
        $question->shouldBeAnInstanceOf(Question::class);
        $repository->add($question)->shouldHaveBeenCalled();
    }

}
