<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 31-12-2018
 * Time: 1:09
 */

namespace App\Application\Answer;


use App\Domain\Answer\Answer\AnswerId;

class UpdateAnswerCommand
{
    private $body;


    public function __construct(AnswerId $answerId, String $body)
    {
        $this->answerId = $answerId;
        $this->body = $body;
    }


    public function answerId()
    {
        return $this->answerId;
    }


    public function body()
    {
        return $this->body;
    }

}