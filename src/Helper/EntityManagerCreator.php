<?php

namespace Lok\CofeeBreaks\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{

    /**
     * @throws ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        include_once 'objectToArray.php';

        $file = file_get_contents('C:\private\connectionFiles.json');
        $content = json_decode($file);
        $content = object_to_array($content);

        $config = ORMSetup::createAttributeMetadataConfiguration(
            array(__DIR__. "/../Model/Entity"),
            true);

        $conn = array(
            'dbname' => $content['dbname'],
            'user' => $content['user'],
            'password' => $content['password'],
            'host' => $content['host'],
            'driver' => $content['driver'],
        );

        return EntityManager::create($conn, $config);
    }

}