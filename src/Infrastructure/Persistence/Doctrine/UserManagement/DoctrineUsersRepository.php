<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Infrastructure\Persistence\Doctrine\UserManagement;

use App\Domain\UserManagement\User;
use App\Domain\UserManagement\User\Email;
use App\Domain\UserManagement\User\UserId;
use App\Domain\UserManagement\UsersRepository;
use Doctrine\ORM\EntityManager as EntityManagerAlias;
use Doctrine\ORM\EntityManagerInterface;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\UserEntityInterface;

/**
 * DoctrineUsersRepository
 *
 * @package App\Infrastructure\Persistence\Doctrine\UserManagement
 */
final class DoctrineUsersRepository implements UsersRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * Creates a DoctrineUsersRepository
     *
     * @param EntityManagerInterface|EntityManagerAlias $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Get a user entity.
     *
     * @param string $username
     * @param string $password
     * @param string $grantType The grant type used
     * @param ClientEntityInterface $clientEntity
     *
     * @return UserEntityInterface
     */
    public function getUserEntityByUserCredentials($username, $password, $grantType, ClientEntityInterface $clientEntity)
    {
        try {
            $user = $this->withEmail(new Email($username));
        } catch (\RuntimeException $caught) {
            return null;
        }

        if (!$user->password()->match($password)) {
            return null;
        }

        return $user;
    }

    /**
     * Adds an user to the repository
     *
     * @param User $user
     * @return User
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function add(User $user): User
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $user;
    }

    /**
     * Persists user changes
     *
     * @param User $user
     * @return User
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update(User $user): User
    {
        $this->entityManager->flush($user);
        return $user;
    }

    /**
     * Removes user from repository
     *
     * @param User $user
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function remove(User $user): void
    {
        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }

    /**
     * Retrieves the user with provided userId
     *
     * @param UserId $userId
     * @return User
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function withUserId(UserId $userId): User
    {
        $user = $this->entityManager->find(User::class, $userId);
        if (! $user instanceof User) {
            throw new \RuntimeException("User not found.");
        }

        return $user;
    }

    /**
     * Retrieves the user with provided email
     *
     * @param Email $email
     * @return User
     *
     * @throws \RuntimeException if user is not found
     */
    public function withEmail(Email $email): User
    {
        $repo = $this->entityManager->getRepository(User::class);
        $user = $repo->findOneBy(['email' => $email]);

        if (! $user instanceof User) {
            throw new \RuntimeException("User not found.");
        }

        return $user;
    }
}
