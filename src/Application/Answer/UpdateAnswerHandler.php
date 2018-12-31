<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 31-12-2018
 * Time: 1:12
 */

namespace App\Application\Answer;


use App\Domain\Answer\AnswerRepository;

class UpdateAnswerHandler
{
    private $answerRepository;


    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }
    public function handler(UpdateAnswerCommand $command)
    {
        $answer= $this->answerRepository->withAnswerId($command->answerId());
        $answer->update($command->body());
        $this->answerRepository->update($answer);
    }
}