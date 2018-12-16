<?php

namespace spec\App\Application\Answer;

use App\Application\Answer\CreateAnswerCommand;
use App\Domain\Question\Question;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateAnswerCommandSpec extends ObjectBehavior
{

    private $user;
    private $question;
    private $body;



    function let(User $user, Question $question)
    {
        $this->user = $user;
        $this->body = 'body';
        $this->question = $question;

        $this->beConstructedWith($this->user, $this->body, $this->question);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateAnswerCommand::class);
    }

    function it_has_a_user()
    {
        $this->user()->shouldBe($this->user);
    }


    function it_has_a_body()
    {
        $this->body()->shouldBe($this->body);
    }

    function it_has_question()
    {
        $this->question()->shouldBe($this->question);
    }



}
