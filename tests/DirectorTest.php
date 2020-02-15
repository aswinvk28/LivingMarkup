<?php
/**
 * This file is part of the LivingMarkup package.
 *
 * (c) Matthew Heroux <matthewheroux@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LivingMarkup\Tests;

use PHPUnit\Framework\TestCase;
use LivingMarkup\Builder\DynamicPageBuilder;
use LivingMarkup\Engine;
use LivingMarkup\Director;

final class DirectorTest extends TestCase
{
    public function testCanBuildPage()
    {
        $config = \LivingMarkup\Configuration::load(__DIR__ . DIRECTORY_SEPARATOR . 'config.yml');
        $config['filename'] = __DIR__ . DIRECTORY_SEPARATOR . 'pages/index.html';

        $builder = new DynamicPageBuilder();
        $new_page = (new Director())->build($builder, $config);

        // TODO: assure this is correct class
        $this->assertInstanceOf(Engine::class, $new_page);
    }
}
