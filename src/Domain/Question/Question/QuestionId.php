<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\Question\Question;

use App\Domain\Comparable;
use App\Domain\Stringable;
use Ramsey\Uuid\Uuid;

/**
 * QuestionId
 *
 * @package App\Domain\Question\Question
 */
final class QuestionId implements Stringable, \JsonSerializable, Comparable
{
    private $uuid;

    public function __construct(string $uuidTxt = null)
    {
        $this->uuid = $uuidTxt
            ? Uuid::fromString($uuidTxt)
            : Uuid::uuid4();
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return (string) $this->uuid;
    }

    /**
     * Returns a text version of the object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->uuid;
    }

    /**
     * Returns true if other object is equal to current one
     *
     * @param mixed $other
     *
     * @return bool
     */
    public function equalsTo($other): bool
    {
        if (! $other instanceof QuestionId) {
            return false;
        }

        return (bool) $other->uuid->equals($this->uuid);
    }
}
