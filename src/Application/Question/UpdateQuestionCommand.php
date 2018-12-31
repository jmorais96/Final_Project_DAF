<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 31-12-2018
 * Time: 1:00
 */

namespace App\Application\Question;


use App\Domain\Question\Question\QuestionId;

class UpdateQuestionCommand
{

    private $questionId;
    private $title;
    private $body;


    /**
     * @param $questionId
     * @param $title
     * @param $body
     */

    public function __construct(QuestionId $questionId, String $title, String $body)
    {
        $this->questionId = $questionId;
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * @return QuestionId
     */

    public function getQuestionId(): QuestionId
    {
        return $this->questionId;
    }


    /**
     * @return String
     */

    public function getTitle(): String
    {
        return $this->title;
    }


    /**
     * @return String
     */

    public function getBody(): String
    {
        return $this->body;
    }

}