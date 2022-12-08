<?php

namespace Lok\CofeeBreaks\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table('usuarios')]
class Usuario
{
    #[Column, Id, GeneratedValue]
    private ?int $id;
    #[Column]
    private string $username;
    #[Column]
    private string $email;
    #[Column]
    private string $password;

    public function __construct(?int $id, string $nick, string $email, string $senha)
    {
        $this->id = $id;
        $this->username = $nick;
        $this->email = $email;
        $this->password = password_hash($senha, PASSWORD_BCRYPT);
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPasswordHash(): string
    {
        return $this->password;
    }
    /////////////////////////////////////////////

}