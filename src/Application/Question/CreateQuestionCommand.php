<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\Question;

use App\Domain\UserManagement\User;

/**
 * CreateQuestionCommand
 *
 * @package App\Application\Question
 */
final class CreateQuestionCommand
{
    private $user;
    private $title;
    private $body;
    private $tags;
    private $answers;

    public function __construct(User $user, String $title, String $body, Array $tags = [])
    {

        $this->user = $user;
        $this->title = $title;
        $this->body = $body;
        $this->tags = $tags;
        $this->answers= [];

    }

    public function user()
    {
        return $this->user;
    }

    public function title()
    {
        return $this->title;
    }

    public function body()
    {
        return $this->body;
    }

    public function answers()
    {
        return $this->answers;
    }

    public function tags()
    {
        return $this->tags;
    }
}