<?php
namespace Xefi\Faker\Bank\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\Bank\Extensions\BankExtension;

final class BankExtensionTest extends TestCase
{
    protected array $ibanFormats;
    protected array $swiftCodes;
    protected array $creditCardTypes;

    protected function setUp(): void
    {
        parent::setUp();

        $bankExtension = new BankExtension(new Randomizer());
        $reflection = new ReflectionClass($bankExtension);
        
        $this->ibanFormats = $reflection->getProperty('ibanFormats')->getValue($bankExtension);
        $this->swiftCodes = $reflection->getProperty('swiftCodes')->getValue($bankExtension);
        $this->creditCardTypes = $reflection->getProperty('creditCardTypes')->getValue($bankExtension);
    }

    public function testIban(): void
    {
        $iban = $this->faker->iban();
        
        $this->assertMatchesRegularExpression('/^[A-Z]{2}[0-9]{2}[A-Z0-9]+$/', $iban);
        
        $countryCode = substr($iban, 0, 2);
        if (isset($this->ibanFormats[$countryCode])) {
            $expectedLength = $this->ibanFormats[$countryCode]['totalLength'];
            $this->assertEquals($expectedLength, strlen($iban));
        }
    }

    public function testIbanWithSpecificCountry(): void
    {
        $iban = $this->faker->iban('FR');
        
        $this->assertStringStartsWith('FR', $iban);
        $this->assertEquals(27, strlen($iban));
        $this->assertMatchesRegularExpression('/^FR[0-9]{25}$/', $iban);
    }

    public function testIbanWithInvalidCountry(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->faker->iban('XX');
    }

    public function testSwiftCode(): void
    {
        $swift = $this->faker->swiftCode();
        
        $this->assertMatchesRegularExpression('/^[A-Z]{4}[A-Z]{2}[A-Z0-9]{2}([A-Z0-9]{3})?$/', $swift);
        $this->assertTrue(in_array(strlen($swift), [8, 11]));
    }

    public function testSwiftCodeWithSpecificCountry(): void
    {
        $swift = $this->faker->swiftCode('FR');
        
        $countryInSwift = substr($swift, 4, 2);
        $this->assertEquals('FR', $countryInSwift);
        
        $frenchSwiftCodes = array_keys($this->swiftCodes['FR']);
        $this->assertContains($swift, $frenchSwiftCodes);
    }

    public function testBankName(): void
    {
        $bankName = $this->faker->bankName();
        
        $this->assertIsString($bankName);
        $this->assertNotEmpty($bankName);
    }

    public function testBankNameWithSpecificCountry(): void
    {
        $bankName = $this->faker->bankName('FR');
        
        $frenchBankNames = array_values($this->swiftCodes['FR']);
        $this->assertContains($bankName, $frenchBankNames);
    }

    public function testCreditCardNumber(): void
    {
        $cardNumber = $this->faker->creditCardNumber();
        
        $this->assertMatchesRegularExpression('/^[0-9]+$/', $cardNumber);
        $this->assertTrue($this->isValidLuhn($cardNumber));
    }

    public function testCreditCardNumberVisa(): void
    {
        $cardNumber = $this->faker->creditCardNumber('visa');
        
        $this->assertStringStartsWith('4', $cardNumber);
        $this->assertContains(strlen($cardNumber), [13, 16, 19]);
        $this->assertTrue($this->isValidLuhn($cardNumber));
    }

    public function testCreditCardNumberMastercard(): void
    {
        $cardNumber = $this->faker->creditCardNumber('mastercard');
        
        $validPrefixes = false;
        foreach (['51', '52', '53', '54', '55', '2221', '2720'] as $prefix) {
            if (str_starts_with($cardNumber, $prefix)) {
                $validPrefixes = true;
                break;
            }
        }
        $this->assertTrue($validPrefixes);
        $this->assertEquals(16, strlen($cardNumber));
        $this->assertTrue($this->isValidLuhn($cardNumber));
    }

    public function testCreditCardNumberInvalidType(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->faker->creditCardNumber('invalid_type');
    }

    public function testCreditCardExpirationDate(): void
    {
        $expirationDate = $this->faker->creditCardExpirationDate();
        
        $this->assertMatchesRegularExpression('/^[0-1][0-9]\/[0-9]{2}$/', $expirationDate);
        
        list($month, $year) = explode('/', $expirationDate);
        $currentYear = date('Y') % 100;
        $currentMonth = date('n');
        
        if ($year > $currentYear || ($year == $currentYear && $month >= $currentMonth)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue($year <= $currentYear + 5);
        }
    }

    public function testCreditCardExpirationDateExpired(): void
    {
        $expirationDate = $this->faker->creditCardExpirationDate(false);
        
        $this->assertMatchesRegularExpression('/^[0-1][0-9]\/[0-9]{2}$/', $expirationDate);
        
        list($month, $year) = explode('/', $expirationDate);
        $currentYear = date('Y') % 100;
        
        $this->assertTrue($year < $currentYear);
    }

    public function testCvv(): void
    {
        $cvv = $this->faker->cvv();
        
        $this->assertMatchesRegularExpression('/^[0-9]{3}$/', $cvv);
    }

    public function testCvv4Digits(): void
    {
        $cvv = $this->faker->cvv(4);
        
        $this->assertMatchesRegularExpression('/^[0-9]{4}$/', $cvv);
    }

    public function testCvvInvalidLength(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->faker->cvv(5);
    }

    /**
     * Validate credit card number using Luhn algorithm
     */
    private function isValidLuhn(string $number): bool
    {
        $sum = 0;
        $isEven = false;

        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $digit = intval($number[$i]);

            if ($isEven) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
            $isEven = !$isEven;
        }

        return $sum % 10 === 0;
    }
}