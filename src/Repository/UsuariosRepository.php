<?php


namespace Lok\CofeeBreaks\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use InvalidArgumentException;
use Lok\CofeeBreaks\Helper\EntityManagerCreator;
use Lok\CofeeBreaks\Model\Usuario;

class UsuariosRepository
{
    private EntityManager $connection;
    private ?Usuario $usuario;

    /**
     * @throws ORMException
     */
    public function __construct(?Usuario $usuario)
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