<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\Answer;

use App\Domain\Answer\Answer\AnswerId;
use App\Domain\Question\Question;
use App\Domain\UserManagement\User;
use App\Domain\Vote\Vote;
use JsonSerializable;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Answer
 *
 * @package App\Domain\Answer
 */
class Answer implements JsonSerializable
{
    private $answerId;

    private $question;
    private $correctAnswer;
    private $body;
    private $vote;
    private $datePublished;
    private $user;
    private $positiveVotes;
    private $negativeVotes;

    /**
     * Answer constructor.
     * @param Question $question
     * @param String $body
     * @param \DateTimeImmutable $datePublished
     * @param User $user
     * @param bool $correctAnswer
     */
    public function __construct(Question $question, String $body, \DateTimeImmutable $datePublished, User $user, Bool $correctAnswer = false)
    {
        $this->answerId=new AnswerId();
        $this->question=$question;
        $this->correctAnswer=$correctAnswer;
        $this->body=$body;
        $this->datePublished=$datePublished;
        $this->user=$user;
        $this->positiveVotes=0;
        $this->negativeVotes=0;
    }

    public function answerId() :AnswerId
    {
        return $this->answerId;
    }
    
    public function question() :Question
    {
        return $this->question;
    }

    public function isItCorrectAnswer() :bool
    {
        return $this->correctAnswer;
    }

    public function body() :string
    {
        return $this->body;
    }

    public function vote() :array
    {
        return (array) $this->vote;
    }

    public function datePublished() :\DateTimeImmutable
    {
        return $this->datePublished;
    }

    public function user() :User
    {
        return $this->user;
    }

    public function updateBody($body) :string
    {
        return $this->body=$body;

    }

    public function setAsCorrect() :bool
    {
        return $this->correctAnswer= true;
    }

    public function positiveVotes() :int
    {
        return $this->positiveVotes;
    }

    public function negativeVotes() :int
    {
        return$this->negativeVotes;
    }

    public function addVote($vote) :int
    {
        if ($vote->isPositive()==true)
        {
            ++$this->positiveVotes;
            return $this->positiveVotes;
        }


        if ($vote->isNegative()==false)
        {
            ++$this->negativeVotes;
            return $this->negativeVotes;
        }

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
            'answerId' => $this->answerId(),
            'question' => $this->question,
            'correctAnswer' => $this->correctAnswer,
            'body' => $this->body,
            'datePublished' =>$this->datePublished,
            'user' => $this->user,
            'postiveVotes' => $this->positiveVotes,
            'negativeVotes' =>$this->negativeVotes
        ];
    }
}
