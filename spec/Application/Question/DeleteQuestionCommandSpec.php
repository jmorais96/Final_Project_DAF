<?php

namespace spec\App\Application\Question;

use App\Application\Question\DeleteQuestionCommand;
use App\Domain\Question\Question\QuestionId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeleteQuestionCommandSpec extends ObjectBehavior
{
    private $questionId;

    function let()
    {
        $this->questionId = new QuestionId();
        $this->beConstructedWith($this->questionId);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DeleteQuestionCommand::class);
    }
}
