<?php

namespace Lok\CofeeBreaks\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\ORMSetup;
use stdClass;

class EntityManagerCreator
{

    /**
     * @throws ORMException
     */
    public static function createEntityManager(): EntityManager
    {
        include_once 'objectToArray.php';

        $file = file_get_contents('C:\private\connectionFiles.json');
        $content = json_decode($file);
        $content = object_to_array($content);

        $config = ORMSetup::createAttributeMetadataConfiguration(array(__DIR__. "/.."), true);
        $conn = array(
            'dbname' => $content['dbname'],
            'user' => $content['user'],
            'password' => $content['password'],
            'host' => $content['host'],
            'driver' => $content['driver'],
        );

        return $entityManager = EntityManager::create($conn, $config);
    }



}