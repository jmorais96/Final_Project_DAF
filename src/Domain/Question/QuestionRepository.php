<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 13-12-2018
 * Time: 9:10
 */

namespace App\Domain\Question;


use App\Domain\Question\Question\QuestionId;

interface QuestionRepository
{
    /**
     * @param Question $question
     * @return mixed
     */
    public function add(Question $question);

    /**
     * @param Question $question
     */
    public function remove(Question $question): void;

    public function withQuestionId(QuestionId $questionId) :Question;

    public function listQuestions();

    public function updateQuestion(Question $question) : Question;
}