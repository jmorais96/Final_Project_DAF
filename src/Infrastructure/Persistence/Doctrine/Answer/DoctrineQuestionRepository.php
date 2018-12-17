<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 17-12-2018
 * Time: 0:43
 */

namespace App\Infrastructure\Persistence\Doctrine\Answer;


use App\Domain\Answer\Answer;
use App\Domain\Answer\AnswerRepository;

class DoctrineQuestionRepository implements AnswerRepository
{

    public function add(Answer $answer)
    {
        // TODO: Implement add() method.
    }

    public function remove(Answer $answer): void
    {
        // TODO: Implement remove() method.
    }
}