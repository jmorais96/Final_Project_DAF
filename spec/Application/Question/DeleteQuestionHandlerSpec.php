<?php

namespace spec\App\Application\Question;

use App\Application\Question\DeleteQuestionHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeleteQuestionHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(DeleteQuestionHandler::class);
    }
}
