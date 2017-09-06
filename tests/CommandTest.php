<?php

/*
* This file is part of the silex2swagger library.
*
* (c) Martin Rademacher <mano@radebatz.net>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Radebatz\Silex2Swagger\Tests;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Radebatz\Silex2Swagger\Console\Command\Silex2SwaggerCommand;

/**
 * Command (integration) tests.
 */
class CommandTest extends \PHPUnit_Framework_TestCase
{

    /**
     */
    protected function runCommand(array $args = [])
    {

        $application = new Application();
        $application->add(new Silex2SwaggerCommand());
        $command = $application->find('silex2swagger:build');

        $command->run(new ArrayInput($args), $output = new BufferedOutput());

        return $output->fetch();
    }

    /**
     */
    public function fixtureExpectations()
    {
        return [
            'empty' => [
                [],
                file_get_contents(__DIR__ . '/Fixtures/empty.json'),
            ],
            'defaults' => [
                ['--path' => __DIR__ . '/Controller'],
                file_get_contents(__DIR__ . '/Fixtures/defaults.json'),
            ],
            'auto' => [
                ['--path' => __DIR__ . '/Controller', '--auto-response' => true, '--auto-description' => true, '--auto-summary' => true],
                file_get_contents(__DIR__ . '/Fixtures/auto.json'),
            ],
        ];
    }

    /**
     * @dataProvider fixtureExpectations
     */
    public function testFixtures($args, $expected)
    {
        $swagger = $this->runCommand($args);
        $this->assertEquals($expected, $swagger);
    }
}