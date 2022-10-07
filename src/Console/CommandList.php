<?php
/**
 * Copyright © EcomDev B.V. All rights reserved.
 * See LICENSE for license details.
 */

declare(strict_types=1);

namespace EcomDev\Magento2Compiler\Console;

use EcomDev\Magento2Compiler\Console\Command\CompileCommand;
use Magento\Framework\ObjectManagerInterface;

class CommandList
{
    private ObjectManagerInterface $objectManager;

    public function __construct(ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function getCommands(): array
    {
        return [
            $this->objectManager->get(CompileCommand::class)
        ];
    }
}
