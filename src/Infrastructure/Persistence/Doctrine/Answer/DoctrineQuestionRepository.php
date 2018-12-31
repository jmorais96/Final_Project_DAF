<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 17-12-2018
 * Time: 0:43
 */

namespace App\Infrastructure\Persistence\Doctrine\Answer;


use App\Domain\Answer\Answer;
use App\Domain\Answer\Answer\AnswerId;
use App\Domain\Answer\AnswerRepository;

class DoctrineQuestionRepository implements AnswerRepository
{

    public function add(Answer $answer)
    {
        $this->entityManager->persist($answer);
        $this->entityManager->flush();
        return $answer;
    }

    public function remove(Answer $answer): void
    {
        $this->entityManager->remove($answer);
        $this->entityManager->flush();
    }

    public function withAnswerId(AnswerId $answerId)
    {
        $answer = $this->entityManager->find(Answer::class, $answerId);
        if (! $answer instanceof AnswerId) {
            throw new \RuntimeException("Answer not found.");
        }

        return $answer;
    }

    public function update(Answer $answer)
    {
        $this->entityManager->flush($answer);
        return $answer;
    }

}