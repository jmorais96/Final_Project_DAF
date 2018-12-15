<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\Question;

use App\Domain\Question\Question;
use App\Domain\Question\QuestionRepository;

/**
 * CreateQuestionHandler
 *
 * @package App\Application\Question
 */
final class CreateQuestionHandler
{
    private $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository=$questionRepository;
    }

    /**
     * @param CreateQuestionCommand $command
     * @return mixed
     * @throws \Exception
     */
    public function handle(CreateQuestionCommand $command)
    {
        $question = new Question($command->user(), $command->title(), $command->body(), $command->tags());
        return $this->questionRepository->add($question);
    }
}
