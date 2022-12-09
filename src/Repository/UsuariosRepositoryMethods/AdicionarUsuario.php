<?php

namespace Lok\CofeeBreaks\Repository\UsuariosRepositoryMethods;

use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

trait AdicionarUsuario
{
    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function adicionarUsuario(): void
    {
        $usuario = $this->verificarEmail($this->usuario);
        $this->connection->persist($usuario);
        $this->connection->flush();
    }
}