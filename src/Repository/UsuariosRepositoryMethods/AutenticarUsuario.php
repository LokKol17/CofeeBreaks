<?php

namespace Lok\CofeeBreaks\Repository\UsuariosRepositoryMethods;

use InvalidArgumentException;
use Lok\CofeeBreaks\Model\Entity\Usuario;

trait AutenticarUsuario
{
    public function autenticarUsuario($email, $senha): void
    {
        $stmt = $this->connection;

        $repository = $stmt->getRepository(Usuario::class)->findOneBy(['email' => $email]);

        if ($repository === NULL) throw new InvalidArgumentException("Usuario ou Senha INCORRETOS");

        /** @var Usuario $repository */
        if (!password_verify($senha, $repository->getPasswordHash())) {
            throw new InvalidArgumentException("Usuario ou Senha INCORRETOS");
        }
        echo "Bem-vindo {$repository->getUsername()}!";
    }
}