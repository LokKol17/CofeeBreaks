<?php

namespace Lok\CofeeBreaks\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    /**
     * @throws ORMException
     */
    public static function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(array(__DIR__. "/.."), true);
        $conn = array(
            'dbname' => 'mydb',
            'user' => 'root',
            'password' => 'secret',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        );

        return $entityManager = EntityManager::create($conn, $config);
    }
}