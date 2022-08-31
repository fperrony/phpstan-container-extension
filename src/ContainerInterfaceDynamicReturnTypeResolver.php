<?php

declare(strict_types=1);

namespace Fcpl\PHPStanContainerExtension;

use Psr\Container\ContainerInterface;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\DynamicMethodReturnTypeExtension;

final class ContainerInterfaceDynamicReturnTypeResolver implements DynamicMethodReturnTypeExtension
{
    use DynamicReturnTypeExtensionTrait;

    /**
     * @return string
     */
    public function getClass(): string
    {
        return ContainerInterface::class;
    }

    /**
     * @param  MethodReflection $methodReflection
     * @return bool
     */
    public function isMethodSupported(MethodReflection $methodReflection): bool
    {
        return $methodReflection->getName() === 'get';
    }


}
