<?php

declare(strict_types=1);

namespace Fcpl\PHPStanContainerExtension\Tests\Data;

use Psr\Container\ContainerInterface;

use function PHPStan\Testing\assertType;

class ContainerInterfaceAsserts
{
    /**
     * @param  ContainerInterface $container
     * @return void
     */
    public function doFoo(ContainerInterface $container): void
    {
        assertType(FooService::class, $container->get(FooService::class));
        assertType('mixed', $container->get('foo'));
        assertType('mixed', $container->get('true'));
        assertType('mixed', $container->get('1'));
    }
}
