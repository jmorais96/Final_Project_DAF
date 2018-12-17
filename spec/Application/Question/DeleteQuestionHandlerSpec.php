<?php

namespace spec\App\Application\Question;

use App\Application\Question\DeleteQuestionCommand;
use App\Application\Question\DeleteQuestionHandler;
use App\Domain\Question\Question;
use App\Domain\Question\Question\QuestionId;
use App\Domain\Question\QuestionRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeleteQuestionHandlerSpec extends ObjectBehavior
{
    private $questionId;

    function let(QuestionRepository $repository, Question $question) {
        $this->questionId = new QuestionId();
        $repository->withQuestionId($this->questionId)->willReturn($question);

        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DeleteQuestionHandler::class);
    }

    function it_handles_delete_user_command(
        QuestionRepository $repository,
        Question $question
    ) {
        $command = new DeleteQuestionCommand($this->questionId);
        $repository->remove($question)->shouldBeCalled();

        $this->handle($command);
    }

}
