<?php
/**
 * Copyright © EcomDev B.V. All rights reserved.
 * See LICENSE for license details.
 */

declare(strict_types=1);

use EcomDev\Magento2Compiler\Console\CommandList;
use Magento\Framework\Console\CommandLocator;

CommandLocator::register(CommandList::class);
