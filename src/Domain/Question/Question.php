<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\Question;

use App\Domain\Answer\Answer;
use App\Domain\Question\Question\QuestionId;
use App\Domain\Tag\Tag;
use App\Domain\UserManagement\User;
use JsonSerializable;
use phpDocumentor\Reflection\Types\Array_;
use Ramsey\Uuid\Uuid;

/**
 * Question
 *
 * @package App\Domain\Question
 */
class Question implements JsonSerializable
{
    private $questionId;
    private $user;
    private $title;
    private $body;
    private $answers = [];
    private $tags;
    private $datePublished;

    /**
     * Question constructor.
     * @param User $user
     * @param String $title
     * @param String $body
     * @param array $tags
     * @throws \Exception
     */
    public function __construct(User $user, String $title, String $body, Array $tags = [])
    {
        $this->questionId = new QuestionId();
        $this->user = $user;
        $this->title=$title;
        $this->body=$body;
        $this->tags=$tags;
        $this->datePublished=new \DateTimeImmutable();
        
    }

    public function questionId() :QuestionId
    {
        return $this->questionId;
    }

    public function user() :User
    {
        return $this->user;
    }

    public function title() :string
    {
        return $this->title;
    }

    public function body() :string
    {
        return $this->body;
    }

    public function tags() :Array
    {
        return $this->tags;
    }

    public function datePublished() :\DateTimeImmutable
    {
        return $this->datePublished;
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
            'questionId' => $this->questionId(),
            'user' => $this->user,
            'title' => $this->title,
            'body' =>$this->body,
            'tag' => $this->tags,
            'datePublished'=>$this->datePublished
        ];
    }

    public function answers() : array
    {
        return $this->answers;
    }

    public function addAnswer($answer) : array
    {
        array_push($this->answers, $answer);
        return $this->answers;
    }

    public function removeAnswer($answer) : array
    {
        $key=array_search($answer, $this->answers);
        unset($this->answers[$key]);
        return $this->answers;
    }

    public function addTags($tag) : array
    {
        array_push($this->tags, $tag);
        return $this->tags;
    }

    public function update(String $title, String $body)
    {
        $this->title=$title;
        $this->body=$body;

    }

    public function correctAnswer()
    {
        foreach ($this->answers as $key => $value)
        {
            if ($value->isItCorrectAnswer()==true)
                return $value;
        }

        return false;
    }


}
