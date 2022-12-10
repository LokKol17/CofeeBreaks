<?php

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Lok\CofeeBreaks\Helper\EntityManagerCreator;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    EntityManagerInterface::class => function () {
        return (new EntityManagerCreator())->getEntityManager();
    }
]);

$container = $containerBuilder->build();
return $container;
