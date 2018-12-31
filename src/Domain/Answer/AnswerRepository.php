<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 12-12-2018
 * Time: 17:30
 */

namespace App\Domain\Answer;


use App\Domain\Answer\Answer\AnswerId;

interface AnswerRepository
{
    public function add(Answer $answer);

    public function remove(Answer $answer): void;

    public function withAnswerId(AnswerId $answerId);

    public function update(Answer $answer);
}