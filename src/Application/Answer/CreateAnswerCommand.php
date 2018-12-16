<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\Answer;

use App\Domain\Question\Question;
use App\Domain\UserManagement\User;

/**
 * CreateAnswerCommand
 *
 * @package App\Application\Answer
 */
final class CreateAnswerCommand
{
    private $user;
    private $body;
    private $question;

    public function __construct(User $user, String $body, Question $question)
    {

        $this->user = $user;
        $this->body = $body;
        $this->question = $question;
    }

    public function user()
    {
        return $this->user;
    }

    public function body()
    {
        return $this->body;
    }

    public function question()
    {
        return $this->question;
    }
}
