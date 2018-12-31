<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\Question;

use App\Domain\Question\QuestionRepository;

/**
 * DeleteQuestionHandler
 *
 * @package App\Application\Question
 */
final class DeleteQuestionHandler
{

    private $questionRepository;
    /**
     * @param $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {

        $this->questionRepository = $questionRepository;

    }
    public function handler(DeleteQuestionCommand $command)
    {

        $question = $this->questionRepository->withQuestionId($command->questionId());
        return $this->questionRepository->remove($question);

    }
}
