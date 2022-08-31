<?php

declare(strict_types=1);

namespace Fcpl\PHPStanContainerExtension\Tests\Data;

use ArrayAccess;

use function PHPStan\Testing\assertType;

class ArrayAccessAsserts
{
    /**
     * @param  ArrayAccess $container
     * @return void
     */
    public function doFoo(ArrayAccess $container): void
    {
        assertType(FooService::class, $container->offsetGet(FooService::class));
        assertType('mixed', $container->offsetGet('foo'));
        assertType('mixed', $container->offsetGet('true'));
        assertType('mixed', $container->offsetGet('1'));
    }
}
