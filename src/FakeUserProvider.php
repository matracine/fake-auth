<?php
namespace mracine\Security\Fake;

use Symfony\Component\Security\Core\User\UserProviderInterface;;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Provide an always authentified user
 *
 * Mainly for develpppement purpose 
 */
class FakeUserProvider implements UserProviderInterface
{
    /**
     * Username of the fake user
     *
     * The username of the provided user
     *
     * @var $username string
     */
    protected $username;

    public function __construct(string $username='Fake user')
    {
        $this->username = $username;
    }

   /**
    * {@inheritdoc}
    */
     public function loadUserByUsername($username)
    {
        return new FakeUser($this->username);
    }

   /**
    * {@inheritdoc}
    */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof FakeUser) {
           throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }
        return new FakeUSer($this->username);
    }

    /**
    * {@inheritdoc}
    */
    public function supportsClass($class)
    {
        return $class === FakeUSer::class;
    }
 }