<?php

namespace Lok\CofeeBreaks\Repository\UsuariosRepositoryMethods;

use Doctrine\ORM\EntityManager;
use InvalidArgumentException;
use Lok\CofeeBreaks\Model\Entity\Usuario;

trait VerificarEmail
{
    public function verificarEmail(Usuario $usuario): Usuario
    {
        /** @var EntityManager $stmt */
        $stmt = $this->connection;
        $email = $usuario->getEmail();
        if($stmt->getRepository(Usuario::class)->findOneBy(['email' => $email]) !== null) {
            throw new InvalidArgumentException("Esse email já foi registrado");
        }

        return $usuario;
    }
}