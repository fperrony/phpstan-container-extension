<?php

declare(strict_types=1);

namespace Fcpl\PHPStanContainerExtension;

use ArrayAccess;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\DynamicMethodReturnTypeExtension;

class ArrayAccessDynamicReturnTypeResolver implements DynamicMethodReturnTypeExtension
{
    use DynamicReturnTypeExtensionTrait;

    /**
     * @return string
     */
    public function getClass(): string
    {
        return ArrayAccess::class;
    }

    /**
     * @param  MethodReflection $methodReflection
     * @return bool
     */
    public function isMethodSupported(MethodReflection $methodReflection): bool
    {
        return $methodReflection->getName() === 'offsetGet';
    }
}
