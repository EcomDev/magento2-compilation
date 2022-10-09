<?php
/**
 * Copyright © EcomDev B.V. All rights reserved.
 * See LICENSE for license details.
 */

declare(strict_types=1);

namespace EcomDev\Magento2Compiler;

use PHPUnit\Framework\TestCase;

/**
 * @group integration
 */
class IntegrationOfCompileCommandTest extends TestCase
{


    /**
     * @test
     * @dataProvider installedMagentoVersions
     */
    public function listsCustomCommand(string $version)
    {
        $output = magentoCommand($version, 'help',  'setup:di:compile', '--format', 'json');

        $this->assertJson($output);

        $result = \json_decode($output, true);

        $this->assertStringContainsString("ecomdev/magento2-compiler", $result['description']);
    }

    public function installedMagentoVersions(): iterable
    {
        foreach (buildVersions() as $version) {
            yield [$version];
        }
    }
}
