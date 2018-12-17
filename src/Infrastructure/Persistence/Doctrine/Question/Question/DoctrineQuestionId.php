<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 17-12-2018
 * Time: 2:53
 */

namespace App\Infrastructure\Persistence\Doctrine\Question\Question;


use App\Domain\Question\Question\QuestionId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;


/**
 * DoctrineQuestionId
 *
 * @package App\Infrastructure\Persistence\Doctrine\UserManagement\Question
 */
class DoctrineQuestionId extends StringType
{

    /**
     * @inheritdoc
     *
     * @param QuestionId $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string) $value;
    }

    /**
     * @inheritdoc
     * @throws \Exception
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new QuestionId($value);
    }

    public function getName()
    {
        return 'QuestionId';
    }
}