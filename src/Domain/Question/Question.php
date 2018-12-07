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
    private $answers;
    private $tags;
    private $datePublished;

    public function __construct(User $user, String $title, String $body, Array $tags, \DateTimeImmutable $datePublished, $answers = [])
    {
        $this->questionId = new QuestionId();
        $this->user = $user;
        $this->title=$title;
        $this->body=$body;
        $this->answers=$answers;
        $this->tags=$tags;
        $this->datePublished=$datePublished;
        
    }

    public function questionId()
    {
        return $this->questionId;
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

    public function tags()
    {
        return $this->tags;
    }

    public function datePublished()
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
    public function jsonSerialize()
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

    public function answers()
    {
        return $this->answers;
    }

    public function addAnswer($answer)
    {
        array_push($this->answers, $answer);
        return $this->answers;
    }

    public function removeAnswer($answer)
    {
        $key=array_search($this->answers, array($answer));
        unset($this->answers[$key]);
        return $this->answers;
    }

    public function addTags($tag)
    {
        array_push($this->tags, $tag);
        return$this->tags;
    }

    public function update(String $title, String $body)
    {
        $this->title=$title;
        $this->body=$body;

    }


}
