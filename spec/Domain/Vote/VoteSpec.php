<?php

namespace spec\App\Domain\Vote;

use App\Domain\UserManagement\User;
use App\Domain\Vote\Vote;
use PhpSpec\ObjectBehavior;
use PhpSpec\Wrapper\Subject\Expectation\Positive;
use Prophecy\Argument;

class VoteSpec extends ObjectBehavior
{

    private $vote;
    /**
     * @throws \Exception
     */
    function let()
    {
        $this->vote=true;
        $this->beConstructedThrough('positive',[]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Vote::class);
    }

    function it_can_check_if_it_is_a_positive_vote()
    {
        $this->isPositive()->shouldBe(true);
    }

    function it_can_check_if_it_is_a_negative_vote()
    {
        $this->beConstructedThrough('negative',[]);
        $this->isNegative()->shouldBe(false);
    }

    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            'vote' => $this->vote,
        ]);
    }

}
