<?php


namespace Lok\CofeeBreaks\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Lok\CofeeBreaks\Helper\EntityManagerCreator;
use Lok\CofeeBreaks\Model\Usuario;

class UsuariosRepository
{
    private EntityManager $connection;
    private Usuario $usuario;

    /**
     * @throws ORMException
     */
    public function __construct(Usuario $usuario)
    {
        $this->connection = EntityManagerCreator::createEntityManager();
        $this->usuario = $usuario;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function adicionarUsuario(): void
    {
        $this->connection->persist($this->usuario);
        $this->connection->flush();
    }
}