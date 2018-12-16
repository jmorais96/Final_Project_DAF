<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\Answer;

use App\Application\Question\CreateQuestionCommand;
use App\Domain\Answer\Answer;
use App\Domain\Answer\AnswerRepository;

/**
 * CreateAnswerHandler
 *
 * @package App\Application\Answer
 */
final class CreateAnswerHandler
{
    /**
     * @var AnswerRepository
     */
    private $answerRepository;

    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    /**
     * @param CreateAnswerCommand $command
     * @return mixed
     * @throws \Exception
     */
    public function handle(CreateAnswerCommand $command)
    {
        $answer = new Answer($command->question(), $command->body(), $command->user());
        return $this->answerRepository->add($answer);
    }
}
