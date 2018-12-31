<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 31-12-2018
 * Time: 1:01
 */

namespace App\Application\Question;


use App\Domain\Question\QuestionRepository;

class UpdateQuestionHandler
{
    private $questionRepository;
    /**
     * UpdateQuestionHandler constructor.
     * @param $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }
    public function handler(UpdateQuestionCommand $command)
    {
        $question = $this->questionRepository->withQuestionId($command->getQuestionId());
        $question->update($command->getTitle(),$command->getBody());
        $this->questionRepository->updateQuestion($question);
    }
}