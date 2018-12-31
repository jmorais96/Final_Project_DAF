<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 31-12-2018
 * Time: 1:06
 */

namespace App\Application\Answer;


use App\Domain\Answer\AnswerRepository;

class DeleteAnswerHandler
{

    private $answerRepository;


    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }
    public function handler(DeleteAnswerCommand $command)
    {
        $answer = $this->answerRepository->withAnswerId($command->answerId());
        return $this->answerRepository->remove($answer);
    }

}