<?php
declare(strict_types = 1);

namespace MojoCode\SqlParser\AST;

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

class ReferenceDefinition
{
    /**
     * Match type: FULL, PARTIAL or SIMPLE
     *
     * @var string
     */
    public $match;

    /**
     * Reference Option: RESTRICT | CASCADE | SET NULL | NO ACTION
     *
     * @var string
     */
    public $onDelete;

    /**
     * Reference Option: RESTRICT | CASCADE | SET NULL | NO ACTION
     *
     * @var string
     */
    public $onUpdate;
    /**
     * @var \MojoCode\SqlParser\AST\Identifier
     */
    public $tableName;

    /**
     * @var IndexColumnName[]
     */
    public $columnNames;

    /**
     * ReferenceDefinition constructor.
     *
     * @param \MojoCode\SqlParser\AST\Identifier $tableName
     * @param array $columnNames
     */
    public function __construct(Identifier $tableName, array $columnNames)
    {
        $this->tableName = $tableName;
        $this->columnNames = $columnNames;
    }
}
