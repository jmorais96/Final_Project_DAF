<?php

namespace spec\App\Application\Question;

use App\Application\Question\CreateQuestionCommand;
use App\Domain\Answer\Answer;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateQuestionCommandSpec extends ObjectBehavior
{

    private $user;
    private $title;
    private $body;


    function let(User $user)
    {
        $this->user = $user;
        $this->title = 'title';
        $this->body = 'body';

        $this->beConstructedWith($this->user, $this->title, $this->body);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateQuestionCommand::class);
    }

    function it_has_a_user()
    {
        $this->user()->shouldBe($this->user);
    }

    function it_has_a_title()
    {
        $this->title()->shouldBe($this->title);
    }

    function it_has_a_body()
    {
        $this->body()->shouldBe($this->body);
    }

    function it_has_answers()
    {
        $this->answers()->shouldBeArray();
    }

    function it_has_tags()
    {
        $this->tags()->shouldBeArray();
    }

}
