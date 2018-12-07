<?php

namespace spec\App\Domain\Tag;

use App\Domain\Tag\Tag;
use PhpSpec\ObjectBehavior;

class TagSpec extends ObjectBehavior
{

    private $description;

    function let()
    {

        $this->description = 'phpspec';

        $this->beConstructedWith($this->description);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Tag::class);
    }

    function it_has_a_tag_id()
    {
        $this->tagId()->shouldBeAnInstanceOf(Tag\TagId::class);
    }

    function it_has_a_description()
    {
        $this->description()->shouldBe($this->description);
    }

    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            'tagId' => $this->tagId(),
            'description' => $this->description,
        ]);
    }
}
