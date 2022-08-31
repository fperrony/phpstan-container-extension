<?php
declare(strict_types = 1);

namespace Fcpl\PHPStanContainerExtension\Tests;

use PHPStan\Testing\TypeInferenceTestCase;

class ArrayAccessDynamicReturnTypeResolverTest extends TypeInferenceTestCase
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
        yield from $this->gatherAssertTypes(__DIR__ . '/Data/ArrayAccessAsserts.php');
    }

    /**
     * @return string[]
     */
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../extension.neon'];
    }
}
