<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 13-12-2018
 * Time: 9:10
 */

namespace App\Domain\Question;


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
}