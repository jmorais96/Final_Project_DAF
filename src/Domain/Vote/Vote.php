<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\Vote;

use App\Domain\UserManagement\User;
use JsonSerializable;

/**
 * Vote
 *
 * @package App\Domain\Vote
 */
class Vote implements JsonSerializable
{
    private $value;

    private CONST POSITIVE=1;
    private CONST NEGATIVE=0;

    private function __construct( bool $value)
    {
        $this->value=$value;
    }

    public static function positive() :Vote
    {
        return new Vote ((bool) self::POSITIVE);
    }

    public static function negative() :Vote
    {
        return new Vote ((bool) self::NEGATIVE);
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
        return [
            'vote' => $this->value
        ];
    }

    public function isPositive() :bool
    {
        return $this->value;
    }

    public function isNegative() :bool
    {
        return $this->value;
    }
}
