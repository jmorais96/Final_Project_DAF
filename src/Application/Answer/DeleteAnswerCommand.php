<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 31-12-2018
 * Time: 1:06
 */

namespace App\Application\Answer;


use App\Domain\Answer\Answer\AnswerId;

class DeleteAnswerCommand
{

    private $answerId;

    /**
     * DeleteAnswerCommand constructor.
     * @param $answerId
     */

    public function __construct(AnswerId $answerId)
    {
        $this->answerId = $answerId;
    }

    /**
     * @return AnswerId
     */

    public function answerId()
    {
        return $this->answerId;
    }

}