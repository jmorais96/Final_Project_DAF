<?php

namespace spec\App\Application\Answer;

use App\Application\Answer\CreateAnswerCommand;
use App\Application\Answer\CreateAnswerHandler;
use App\Domain\Answer\Answer;
use App\Domain\Answer\AnswerRepository;
use App\Domain\Question\Question;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateAnswerHandlerSpec extends ObjectBehavior
{
    function let(AnswerRepository $repository)
    {
        $repository->add(Argument::type(Answer::class))->willReturnArgument(0);
        $this->beConstructedWith($repository);
    }

    function it_handles_the_create_user_command(AnswerRepository $repository, User $user, Question $question)
    {
        $body= 'body';
        $command = new CreateAnswerCommand($user->getWrappedObject(), $body, $question->getWrappedObject());

        $answer = $this->handle($command);
        $answer->shouldBeAnInstanceOf(Answer::class);
        $repository->add($answer)->shouldHaveBeenCalled();
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateAnswerHandler::class);
    }
}
