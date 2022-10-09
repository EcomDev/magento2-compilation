<?php
/**
 * Copyright © EcomDev B.V. All rights reserved.
 * See LICENSE for license details.
 */

declare(strict_types=1);

function buildPath(string... $parts) {
    $basePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'build';
    if (!$parts) {
        return $basePath;
    }

    return $basePath . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $parts);
}

function magentoCommand(string $version, string $command, string... $args)
{
    return shell_exec(
        sprintf(
            "%s %s %s",
            buildPath($version, 'bin/magento'),
            escapeshellcmd($command),
            implode(' ', array_map('escapeshellarg', $args))
        )
    );
}

function buildVersions(): iterable
{
    foreach (new \DirectoryIterator(buildPath()) as $item) {
        if ($item->isDot() || !$item->isDir()) {
            continue;
        }

        if (!file_exists(buildPath($item->getFilename(), 'bin/magento'))) {
            continue;
        }

        yield $item->getFilename();
    }
}
