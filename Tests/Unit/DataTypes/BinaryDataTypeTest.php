<?php
declare(strict_types = 1);

namespace MojoCode\SqlParser\Tests\Unit\DataTypes;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use MojoCode\SqlParser\AST\DataType\BinaryDataType;
use MojoCode\SqlParser\AST\DataType\VarBinaryDataType;
use MojoCode\SqlParser\Tests\Unit\AbstractDataTypeBaseTestCase;

class BinaryDataTypeTest extends AbstractDataTypeBaseTestCase
{
    /**
     * Data provider for canParseBinaryDataType()
     *
     * @return array
     */
    public function canParseBinaryDataTypeProvider(): array
    {
        return [
            'BINARY without length' => [
                'BINARY',
                BinaryDataType::class,
                0,
            ],
            'BINARY with length' => [
                'BINARY(200)',
                BinaryDataType::class,
                200,
            ],
            'VARBINARY without length' => [
                'VARBINARY',
                VarBinaryDataType::class,
                0,
            ],
            'VARBINARY with length' => [
                'VARBINARY(200)',
                VarBinaryDataType::class,
                200,
            ],
        ];
    }

    /**
     * @test
     * @dataProvider canParseBinaryDataTypeProvider
     * @param string $columnDefinition
     * @param string $className
     * @param int $length
     */
    public function canParseDataType(string $columnDefinition, string $className, int $length)
    {
        $subject = $this->createSubject($columnDefinition);

        $this->assertInstanceOf($className, $subject->dataType);
        $this->assertSame($length, $subject->dataType->length);
    }
}
