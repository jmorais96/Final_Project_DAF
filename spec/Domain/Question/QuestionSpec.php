<?php

namespace spec\App\Domain\Question;

use App\Domain\Answer\Answer;
use App\Domain\Question\Question;
use App\Domain\Question\Question\QuestionId;
use App\Domain\Tag\Tag;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\PhpSpec\Wrapper\Subject\WrappedObjectSpec;

class QuestionSpec extends ObjectBehavior
{

    private $user;

    private $title;

    private $body;

    private $answers;

    private $tags;

    private $datePublished;

    function let(User $user, \DateTimeImmutable $datePublished)
    {

        $this->user=$user;
        $this->title='title';
        $this->body= 'body';
        $this->answers=[];
        $this->tags=[];
        $this->datePublished=$datePublished;

        $this->beConstructedWith($this->user, $this->title, $this->body, $this->tags, $this->datePublished);
    }


    function it_is_initializable()
    {
        $this->shouldHaveType(Question::class);
    }

    function it_has_a_question_id()
    {
        $this->questionId()->shouldBeAnInstanceOf(QuestionId::class);
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
        $this->answers()->shouldBe($this->answers);
        $this->answers()->shouldBeArray($this->answers);
    }

    function it_has_tags()
    {
        $this->tags()->shouldBe($this->tags);
    }

    function it_has_a_date_published()
    {
        $this->datePublished()->shouldBe($this->datePublished);
    }

    function it_can_add_an_answer(Answer $answer)
    {
        $answers=$this->answers()->getWrappedObject();
        $this->addAnswer($answer)->shouldHaveCount(count($answers)+1);
        $this->addAnswer($answer)->shouldBeArray();
    }

    function it_can_remove_an_answer(Answer $answer)
    {
        $this->addAnswer($answer);
        $answers=$this->answers()->getWrappedObject();
        $this->removeAnswer($answer)->shouldNotBe(array_search($answer, $answers));
    }

    function it_can_add_a_tag(Tag $tag)
    {

        $tags=$this->tags()->getWrappedObject();
        $this->addTags($tag)->shouldHaveCount(count($tags)+1);
        $this->addTags($tag)->shouldBeArray();
    }


    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            'questionId' => $this->questionId(),
            'user' => $this->user,
            'title' => $this->title,
            'body' =>$this->body,
            'tag' => $this->tags,
            'datePublished'=>$this->datePublished
        ]);

    }

    function it_can_update()
    {
        $title='title';
        $body='body';
        $this->update($title, $body);
        $this->body()->shouldBe($this->body);
        $this->title()->shouldBe($this->title);
    }

    function it_has_a_correct_answer(Answer $answer)
    {

    }


}