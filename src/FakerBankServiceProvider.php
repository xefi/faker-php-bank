<?php
namespace Xefi\Faker\Bank;

use Xefi\Faker\Bank\Extensions\BankExtension;
use Xefi\Faker\Providers\Provider;

class FakerBankServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->extensions([
            BankExtension::class
        ]);
    }
}