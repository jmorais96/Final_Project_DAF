<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\Tag;

use App\Domain\Tag\Tag\TagId;
use JsonSerializable;
use phpDocumentor\Reflection\Types\Array_;

/**
 * Tag
 *
 * @package App\Domain\Tag
 */
class Tag implements JsonSerializable
{

    private $tagId;
    private $description;

    /**
     * Tag constructor.
     * @param String $description
     * @throws \Exception
     */
    public function __construct(String $description)
    {
        $this->tagId = new TagId();
        $this->description=$description;
    }


    public function description() :string
    {
        return $this->description;
    }

    public function tagId() :tagId
    {
        return $this->tagId;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize() :Array
    {
        return [
            'tagId' => $this->tagId,
            'description' => $this->description,
        ];
    }
}
