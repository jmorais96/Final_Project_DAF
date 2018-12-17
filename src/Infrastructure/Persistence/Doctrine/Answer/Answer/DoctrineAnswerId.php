<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 22-12-2018
 * Time: 16:59
 */

namespace App\Infrastructure\Persistence\Doctrine\Answer\Answer;



use App\Domain\Answer\Answer\AnswerId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class DoctrineAnswerId extends StringType
{

    /**
     * @inheritdoc
     *
     * @param AnswerId $value
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
        return new AnswerId($value);
    }

    public function getName()
    {
        return 'AnswerId';
    }

}