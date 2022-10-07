<?php
/**
 * Copyright © EcomDev B.V. All rights reserved.
 * See LICENSE for license details.
 */

declare(strict_types=1);

namespace EcomDev\Magento2Compiler\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompileCommand extends Command
{
    protected function configure()
    {
        $this->setName('setup:di:compile');
        $this->setDescription('DI compilation powered by <info>ecomdev/magento2-compiler</info>.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<info>Compilation is WIP</info>");
    }
}
