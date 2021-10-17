<?php

namespace MVC\Courses\Entity;

/**
 * @Entity
 * @Table(name="users")
 */
class User
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $email;
    /**
     * @Column(type="string")
     */
    private $password;

    public function passwordIsCorrect(string $purePassword): bool
    {
        return password_verify($purePassword, $this->password);
    }
}
