<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 15-12-2018
 * Time: 15:38
 */

namespace App\Infrastructure\Persistence\Doctrine\Question;


use App\Domain\Question\Question;
use App\Domain\Question\Question\QuestionId;
use App\Domain\Question\QuestionRepository;
use Doctrine\ORM\EntityManager as EntityManagerAlias;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineQuestionRepository implements QuestionRepository
{
    private $entityManager;

    /**
     * DoctrineQuestionRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param Question $question
     * @return Question
     */
    public function add(Question $question): Question
    {
        $this->entityManager->persist($question);
        $this->entityManager->flush();
        return $question;
    }

    /**
     * @param Question $question
     */
    public function remove(Question $question): void
    {
        $this->entityManager->remove($question);
        $this->entityManager->flush();
    }

    public function withQuestionId(QuestionId $questionId): Question
    {
        $question = $this->entityManager->find(Question::class, $questionId);
        if (! $question instanceof QuestionId) {
            throw new \RuntimeException("Question not found.");
        }

        return $question;
    }

    public function listQuestions()
    {
        $query = $this->entityManager->createQuery('SELECT u FROM  App/Domain/Question/Question u');
        return $query->getResult();
    }
}