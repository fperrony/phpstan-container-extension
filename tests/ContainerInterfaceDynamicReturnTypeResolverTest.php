<?php
declare(strict_types = 1);

namespace Fcpl\PHPStanContainerExtension\Tests;

use PHPStan\Testing\TypeInferenceTestCase;

class ContainerInterfaceDynamicReturnTypeResolverTest extends TypeInferenceTestCase
{
    /**
     * @dataProvider dataFileAsserts
     */
    public function testFileAsserts(string $assertType, string $file, ...$args): void
    {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }

    /**
     * @return iterable<mixed>
     */
    public function dataFileAsserts(): iterable
    {
        yield from $this->gatherAssertTypes(__DIR__ . '/Data/ContainerInterfaceAsserts.php');
    }

    /**
     * @return string[]
     */
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../extension.neon'];
    }
}
