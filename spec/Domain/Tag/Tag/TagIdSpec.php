<?php

namespace spec\App\Domain\Tag\Tag;

use App\Domain\Comparable;
use App\Domain\Stringable;
use App\Domain\Tag\Tag\TagId;
use PhpSpec\Exception\Example\FailureException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ramsey\Uuid\Uuid;

class TagIdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(TagId::class);
    }

    /**
     * @throws FailureException
     */
    function it_can_be_converted_to_string()
    {
        $this->shouldBeAnInstanceOf(Stringable::class);
        $result = $this->__toString();
        if (!Uuid::isValid($result->getWrappedObject())) {
            throw new FailureException(
                "Expecting a valid UUID string, but its not..."
            );
        }
    }

    /**
     * @throws \Exception
     */
    function it_can_be_compared_to_other_object()
    {
        $other = new TagId($this->__toString()->getWrappedObject());
        $this->shouldBeAnInstanceOf(Comparable::class);
        $this->equalsTo($other)->shouldBe(true);
    }

    /**
     * @throws \Exception
     */
    function it_can_be_created_from_an_existing_string()
    {
        $uuidTxt = Uuid::uuid4()->toString();
        $this->beConstructedWith($uuidTxt);
        $this->shouldHaveType(TagId::class);
        $this->jsonSerialize()->shouldBe($uuidTxt);
    }
}
