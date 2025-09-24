<?php
namespace Xefi\Faker\Bank\Tests\Unit;

use Xefi\Faker\Container\Container;
use Xefi\Faker\Bank\FakerBankServiceProvider;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Container $faker;

    protected function setUp(): void
    {
        Container::packageManifestPath('/tmp/packages.php');

        (new FakerBankServiceProvider)->boot();

        $this->faker = new Container(false);
    }
}