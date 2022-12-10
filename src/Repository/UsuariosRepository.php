<?php


namespace Lok\CofeeBreaks\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Lok\CofeeBreaks\Helper\EntityManagerCreator;
use Lok\CofeeBreaks\Model\Entity\Usuario;
use Lok\CofeeBreaks\Repository\UsuariosRepositoryMethods\AdicionarUsuario;
use Lok\CofeeBreaks\Repository\UsuariosRepositoryMethods\AutenticarUsuario;
use Lok\CofeeBreaks\Repository\UsuariosRepositoryMethods\VerificarEmail;

class UsuariosRepository
{
    private EntityManager $connection;
    private ?Usuario $usuario;

    /**
     * @throws ORMException
     */
    public function __construct(?Usuario $usuario)
    {
        $this->connection = (new EntityManagerCreator())->getEntityManager();
        $this->usuario = $usuario;
    }

    use AdicionarUsuario;
    use AutenticarUsuario;
    use VerificarEmail;
}