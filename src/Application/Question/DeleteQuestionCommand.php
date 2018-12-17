<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\Question;

use App\Domain\Question\Question;

/**
 * DeleteQuestionCommand
 *
 * @package App\Application\Question
 */
final class DeleteQuestionCommand
{
    /**
     * @var Question\QuestionId
     */
    private $questionId;

    public function __construct(Question\QuestionId $questionId)
    {
        $this->questionId = $questionId;
    }

    public function questionId()
    {
        return $this->questionId;
    }
}
