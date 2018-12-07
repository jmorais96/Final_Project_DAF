<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\Tag\Tag;

use App\Domain\Comparable;
use App\Domain\Stringable;
use Ramsey\Uuid\Uuid;

/**
 * TagId
 *
 * @package App\Domain\Tag\Tag
 */
final class TagId implements Stringable, Comparable
{

    private $uuid;

    /**
     * TagId constructor.
     * @param string|null $uuidTxt
     * @throws \Exception
     */
    public function __construct(string $uuidTxt = null)
    {
        $this->uuid = $uuidTxt
            ? Uuid::fromString($uuidTxt)
            : Uuid::uuid4();
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
        if (! $other instanceof TagId) {
            return false;
        }

        return (bool) $other->uuid->equals($this->uuid);
    }

    /**
     * Returns a text version of the object
     *
     * @return string
     */
    public function __toString()
    {
        return (String) $this->uuid;
    }

    /**
     * @return string
     */
    public function jsonSerialize()
    {
        return (string) $this->uuid;
    }
}
