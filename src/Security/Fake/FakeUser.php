<?php
namespace mracine\Security\Fake;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * Represent a authenticated user
 *
 * Constructed by FakeUserProvider
 */

class FakeUser implements UserInterface, EquatableInterface
{
    /**
     * @var string $username
     */
    private $username;

    /**
     * @var string password
     */
    private $password;

    /**
     * @var string[] list of roles
     */
    private $roles;

    public function __construct(
        ?string $username = 'Fake user', 
        ?string $password = 'nopassword', 
        array $roles = []
    )
    {
        if ('' === $username || null === $username) {
            throw new \InvalidArgumentException('The username cannot be empty.');
        }

        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
    }

    public function __toString()
    {
        return $this->getUsername();
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function isEqualTo(UserInterface $user)
    {
        return true;
    }
}
