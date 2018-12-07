<?php

namespace spec\App\Domain\Answer;

use App\Domain\Answer\Answer;
use App\Domain\Answer\Answer\AnswerId;
use App\Domain\Question\Question;
use App\Domain\Question\Question\QuestionId;
use App\Domain\UserManagement\User;
use App\Domain\Vote\Vote;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnswerSpec extends ObjectBehavior
{
    private $question;

    private $correctAnswer;

    private $body;

    private $datePublished;

    private $user;

    private $positiveVotes;

    private $negativeVotes;

    function let(Question $question, \DateTimeImmutable $datePublished, User $user)
    {

        $this->question=$question;
        $this->correctAnswer=false;
        $this->body= 'body';
        $this->datePublished=$datePublished;
        $this->user=$user;
        $this->positiveVotes=0;
        $this->negativeVotes=0;
        $this->beConstructedWith($this->question, $this->body, $this->datePublished, $this->user);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Answer::class);
    }

    function it_has_a_answer_id()
    {
        $this->answerId()->shouldBeAnInstanceOf(AnswerId::class);
    }

    function it_has_a_question()
    {
        $this->question()->shouldBeAnInstanceOf(Question::class);
    }

    function it_has_a_correct_answer()
    {
        $this->correctAnswer()->shouldBe($this->correctAnswer);
    }

    function it_has_a_body()
    {
        $this->body()->shouldBe($this->body);
    }

    function it_has_a_date_published()
    {
        $this->datePublished()->shouldBe($this->datePublished);
    }

    function it_has_a_user()
    {
        $this->user()->shouldBe($this->user);
    }

    function it_has_positive_votes()
    {
        $this->positiveVotes()->shouldBe($this->positiveVotes);
    }

    function it_has_negative_votes()
    {
        $this->negativeVotes()->shouldBe($this->negativeVotes);
    }

    function it_can_update_body()
    {
        $body='New Body';
        $this->updateBody($body)->shouldBe($body);
    }

    function it_can_set_as_correct_answer()
    {
        $this->setAsCorrect()->shouldBe(true);
    }

    function it_can_add_vote()
    {
        $positive=$this->positiveVotes();
        $negative=$this->negativeVotes();
        $this->addVote(vote::negative())->shouldBe($negative->getWrappedObject()+1);
        $this->addVote(vote::positive())->shouldBe($positive->getWrappedObject()+1);
    }

    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            'answerId' => $this->answerId(),
            'question' => $this->question,
            'correctAnswer' => $this->correctAnswer,
            'body' => $this->body,
            'datePublished' =>$this->datePublished,
            'user' => $this->user,
            'postiveVotes' => $this->positiveVotes,
            'negativeVotes' =>$this->negativeVotes
        ]);
    }
}
