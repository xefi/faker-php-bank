<?php

namespace Xefi\Faker\Bank\Extensions;

use Xefi\Faker\Calculators\Iban;
use Xefi\Faker\Extensions\Extension;

class BankExtension extends Extension
{
    protected array $ibanFormats = [
        'AD' => ['bankCodeLength' => 8, 'accountLength' => 12, 'totalLength' => 24],
        'AE' => ['bankCodeLength' => 3, 'accountLength' => 16, 'totalLength' => 23],
        'AL' => ['bankCodeLength' => 8, 'accountLength' => 16, 'totalLength' => 28],
        'AT' => ['bankCodeLength' => 5, 'accountLength' => 11, 'totalLength' => 20],
        'AZ' => ['bankCodeLength' => 4, 'accountLength' => 20, 'totalLength' => 28],
        'BA' => ['bankCodeLength' => 6, 'accountLength' => 10, 'totalLength' => 20],
        'BE' => ['bankCodeLength' => 3, 'accountLength' => 9, 'totalLength' => 16],
        'BG' => ['bankCodeLength' => 4, 'accountLength' => 14, 'totalLength' => 22],
        'BH' => ['bankCodeLength' => 4, 'accountLength' => 14, 'totalLength' => 22],
        'BR' => ['bankCodeLength' => 8, 'accountLength' => 17, 'totalLength' => 29],
        'BY' => ['bankCodeLength' => 4, 'accountLength' => 20, 'totalLength' => 28],
        'CH' => ['bankCodeLength' => 5, 'accountLength' => 12, 'totalLength' => 21],
        'CR' => ['bankCodeLength' => 4, 'accountLength' => 14, 'totalLength' => 22],
        'CY' => ['bankCodeLength' => 8, 'accountLength' => 16, 'totalLength' => 28],
        'CZ' => ['bankCodeLength' => 4, 'accountLength' => 16, 'totalLength' => 24],
        'DE' => ['bankCodeLength' => 8, 'accountLength' => 10, 'totalLength' => 22],
        'DK' => ['bankCodeLength' => 4, 'accountLength' => 10, 'totalLength' => 18],
        'DO' => ['bankCodeLength' => 4, 'accountLength' => 20, 'totalLength' => 28],
        'EE' => ['bankCodeLength' => 2, 'accountLength' => 14, 'totalLength' => 20],
        'EG' => ['bankCodeLength' => 4, 'accountLength' => 21, 'totalLength' => 29],
        'ES' => ['bankCodeLength' => 8, 'accountLength' => 12, 'totalLength' => 24],
        'FI' => ['bankCodeLength' => 6, 'accountLength' => 8, 'totalLength' => 18],
        'FO' => ['bankCodeLength' => 4, 'accountLength' => 10, 'totalLength' => 18],
        'FR' => ['bankCodeLength' => 10, 'accountLength' => 13, 'totalLength' => 27],
        'GB' => ['bankCodeLength' => 4, 'accountLength' => 14, 'totalLength' => 22],
        'GE' => ['bankCodeLength' => 2, 'accountLength' => 16, 'totalLength' => 22],
        'GI' => ['bankCodeLength' => 4, 'accountLength' => 15, 'totalLength' => 23],
        'GL' => ['bankCodeLength' => 4, 'accountLength' => 10, 'totalLength' => 18],
        'GR' => ['bankCodeLength' => 7, 'accountLength' => 16, 'totalLength' => 27],
        'GT' => ['bankCodeLength' => 4, 'accountLength' => 20, 'totalLength' => 28],
        'HR' => ['bankCodeLength' => 7, 'accountLength' => 10, 'totalLength' => 21],
        'HU' => ['bankCodeLength' => 7, 'accountLength' => 17, 'totalLength' => 28],
        'IE' => ['bankCodeLength' => 4, 'accountLength' => 14, 'totalLength' => 22],
        'IL' => ['bankCodeLength' => 6, 'accountLength' => 13, 'totalLength' => 23],
        'IS' => ['bankCodeLength' => 4, 'accountLength' => 18, 'totalLength' => 26],
        'IT' => ['bankCodeLength' => 11, 'accountLength' => 12, 'totalLength' => 27],
        'JO' => ['bankCodeLength' => 4, 'accountLength' => 22, 'totalLength' => 30],
        'KW' => ['bankCodeLength' => 4, 'accountLength' => 22, 'totalLength' => 30],
        'KZ' => ['bankCodeLength' => 3, 'accountLength' => 13, 'totalLength' => 20],
        'LB' => ['bankCodeLength' => 4, 'accountLength' => 20, 'totalLength' => 28],
        'LC' => ['bankCodeLength' => 4, 'accountLength' => 24, 'totalLength' => 32],
        'LI' => ['bankCodeLength' => 5, 'accountLength' => 12, 'totalLength' => 21],
        'LT' => ['bankCodeLength' => 5, 'accountLength' => 11, 'totalLength' => 20],
        'LU' => ['bankCodeLength' => 3, 'accountLength' => 13, 'totalLength' => 20],
        'LV' => ['bankCodeLength' => 4, 'accountLength' => 13, 'totalLength' => 21],
        'MC' => ['bankCodeLength' => 10, 'accountLength' => 13, 'totalLength' => 27],
        'MD' => ['bankCodeLength' => 2, 'accountLength' => 18, 'totalLength' => 24],
        'ME' => ['bankCodeLength' => 3, 'accountLength' => 15, 'totalLength' => 22],
        'MK' => ['bankCodeLength' => 3, 'accountLength' => 12, 'totalLength' => 19],
        'MR' => ['bankCodeLength' => 10, 'accountLength' => 13, 'totalLength' => 27],
        'MT' => ['bankCodeLength' => 4, 'accountLength' => 23, 'totalLength' => 31],
        'MU' => ['bankCodeLength' => 8, 'accountLength' => 18, 'totalLength' => 30],
        'NL' => ['bankCodeLength' => 4, 'accountLength' => 10, 'totalLength' => 18],
        'NO' => ['bankCodeLength' => 4, 'accountLength' => 7, 'totalLength' => 15],
        'PK' => ['bankCodeLength' => 4, 'accountLength' => 16, 'totalLength' => 24],
        'PL' => ['bankCodeLength' => 8, 'accountLength' => 16, 'totalLength' => 28],
        'PS' => ['bankCodeLength' => 4, 'accountLength' => 21, 'totalLength' => 29],
        'PT' => ['bankCodeLength' => 8, 'accountLength' => 13, 'totalLength' => 25],
        'QA' => ['bankCodeLength' => 4, 'accountLength' => 21, 'totalLength' => 29],
        'RO' => ['bankCodeLength' => 4, 'accountLength' => 16, 'totalLength' => 24],
        'RS' => ['bankCodeLength' => 3, 'accountLength' => 15, 'totalLength' => 22],
        'SA' => ['bankCodeLength' => 2, 'accountLength' => 18, 'totalLength' => 24],
        'SE' => ['bankCodeLength' => 3, 'accountLength' => 17, 'totalLength' => 24],
        'SI' => ['bankCodeLength' => 5, 'accountLength' => 10, 'totalLength' => 19],
        'SK' => ['bankCodeLength' => 4, 'accountLength' => 16, 'totalLength' => 24],
        'SM' => ['bankCodeLength' => 11, 'accountLength' => 12, 'totalLength' => 27],
        'TN' => ['bankCodeLength' => 5, 'accountLength' => 15, 'totalLength' => 24],
        'TR' => ['bankCodeLength' => 6, 'accountLength' => 16, 'totalLength' => 26],
        'UA' => ['bankCodeLength' => 6, 'accountLength' => 19, 'totalLength' => 29],
        'VG' => ['bankCodeLength' => 4, 'accountLength' => 16, 'totalLength' => 24],
        'XK' => ['bankCodeLength' => 4, 'accountLength' => 12, 'totalLength' => 20],
    ];

    protected array $swiftCodes = [
        'FR' => [
            'BNPAFRPP' => 'BNP Paribas',
            'CRLYFRPP' => 'Crédit Lyonnais',
            'SOGEFRPP' => 'Société Générale',
            'CCFRFRPP' => 'Crédit Agricole',
            'AGRIFRPP' => 'Crédit Agricole Corporate',
            'BDFEFRPP' => 'Banque de France',
        ],
        'DE' => [
            'DEUTDEFF' => 'Deutsche Bank',
            'DRESDEFF' => 'Commerzbank',
            'COBADEFF' => 'Commerzbank',
            'BYLADEMA' => 'Bayern LB',
            'GENODEFF' => 'DZ Bank',
            'MARKDEFF' => 'Bundesbank',
        ],
        'GB' => [
            'BARCGB22' => 'Barclays Bank',
            'HBUKGB4B' => 'HSBC Bank',
            'NWBKGB2L' => 'National Westminster Bank',
            'LOYDGB21' => 'Lloyds Bank',
            'RBOSGB2L' => 'Royal Bank of Scotland',
            'MIDLGB22' => 'HSBC Bank',
        ],
        'US' => [
            'CHASUS33' => 'JPMorgan Chase',
            'BOFAUS3N' => 'Bank of America',
            'CITIUS33' => 'Citibank',
            'WFBIUS6S' => 'Wells Fargo Bank',
            'MRMDUS33' => 'Bank of New York Mellon',
            'PNCCUS33' => 'PNC Bank',
        ],
        'IT' => [
            'BCITITMM' => 'Intesa Sanpaolo',
            'UNCRITM1' => 'UniCredit',
            'PASCITM1' => 'Banca Monte dei Paschi di Siena',
            'BLOPIT22' => 'BNL BNP Paribas',
            'UBSPITM1' => 'UBS Europe SE',
            'ICRAITR1' => 'ICRA',
        ],
        'ES' => [
            'BSCHESMM' => 'Banco Santander',
            'CAIXESBB' => 'CaixaBank',
            'BBVAESMM' => 'Banco Bilbao Vizcaya Argentaria',
            'SABBESM1' => 'Banco de Sabadell',
            'POPUESMM' => 'Banco Popular Español',
            'BCOEESMM' => 'Banco Central Hispano',
        ],
    ];

    protected array $creditCardTypes = [
        'visa' => [
            'prefixes' => ['4'],
            'lengths' => [13, 16, 19],
        ],
        'mastercard' => [
            'prefixes' => ['51', '52', '53', '54', '55', '2221', '2720'],
            'lengths' => [16],
        ],
        'american_express' => [
            'prefixes' => ['34', '37'],
            'lengths' => [15],
        ],
        'discover' => [
            'prefixes' => ['6011', '622126', '622925', '644', '645', '646', '647', '648', '649', '65'],
            'lengths' => [16, 19],
        ],
        'jcb' => [
            'prefixes' => ['3528', '3589'],
            'lengths' => [16],
        ],
        'diners_club' => [
            'prefixes' => ['300', '301', '302', '303', '304', '305', '36', '38'],
            'lengths' => [14],
        ],
    ];

    /**
     * Same signature as the core FinancialExtension::iban(), so installing this
     * extension does not break existing calls.
     *
     * - With a format, it behaves like the core: the BBAN follows the format
     *   ({d} => digit, {l} => letter, {a} => any).
     * - Without a format, it uses the real BBAN length of the country when known,
     *   and falls back to 24 digits like the core otherwise.
     *
     * @param ?string $countryCode ISO 3166-1 alpha-2 country code
     * @param ?string $format      [{d} => digit, {l} => letter, {a} => any]
     */
    public function iban(?string $countryCode = null, ?string $format = null): string
    {
        $countryCode = strtoupper($countryCode ?? $this->pickArrayRandomKey($this->ibanFormats));

        if ($format === null) {
            $format = isset($this->ibanFormats[$countryCode])
                ? str_repeat('{d}', $this->ibanFormats[$countryCode]['bankCodeLength'] + $this->ibanFormats[$countryCode]['accountLength'])
                : str_repeat('{d}', 24);
        }

        $bban = $this->formatString($format);

        return $countryCode . Iban::checksum($countryCode . '00' . $bban) . $bban;
    }

    public function swiftCode(?string $countryCode = null): string
    {
        if ($countryCode === null) {
            $countryCode = $this->pickArrayRandomKey($this->swiftCodes);
        }

        $countryCode = strtoupper($countryCode);

        if (isset($this->swiftCodes[$countryCode])) {
            return $this->pickArrayRandomKey($this->swiftCodes[$countryCode]);
        }

        $bankCode = $this->formatString('{l}{l}{l}{l}');
        $locationCode = $this->formatString('{d}{d}');
        $branchCode = $this->randomizer->getInt(0, 1) ? $this->formatString('{l}{l}{l}') : '';

        return strtoupper($bankCode . $countryCode . $locationCode . $branchCode);
    }

    public function bankName(string $countryCode = 'US'): string
    {
        $countryCode = strtoupper($countryCode);

        if (isset($this->swiftCodes[$countryCode])) {
            $banks = $this->swiftCodes[$countryCode];
            return $this->pickArrayRandomElement($banks);
        }

        $genericNames = [
            'National Bank',
            'Commercial Bank',
            'International Bank',
            'Central Bank',
            'People\'s Bank',
            'State Bank',
            'First Bank',
            'United Bank',
            'Global Bank',
            'Metropolitan Bank',
        ];

        return $this->pickArrayRandomElement($genericNames);
    }

    public function creditCardNumber(?string $type = null): string
    {
        if ($type === null) {
            $type = $this->pickArrayRandomKey($this->creditCardTypes);
        }

        $type = strtolower($type);

        if (!isset($this->creditCardTypes[$type])) {
            throw new \InvalidArgumentException("Unsupported credit card type: {$type}");
        }

        $cardType = $this->creditCardTypes[$type];
        $prefix = $this->pickArrayRandomElement($cardType['prefixes']);
        $length = $this->pickArrayRandomElement($cardType['lengths']);

        $number = $prefix . $this->formatString(str_repeat('{d}', $length - strlen($prefix) - 1));

        $checkDigit = $this->calculateLuhnCheckDigit($number);

        return $number . $checkDigit;
    }

    public function creditCardExpirationDate(bool $valid = true): string
    {
        if ($valid) {
            $month = $this->randomizer->getInt(1, 12);
            $year = $this->randomizer->getInt(date('Y'), date('Y') + 5);
        } else {
            $month = $this->randomizer->getInt(1, 12);
            $year = $this->randomizer->getInt(date('Y') - 10, date('Y') - 1);
        }

        return sprintf('%02d/%02d', $month, $year % 100);
    }

    public function cvv(int $length = 3): string
    {
        if (!in_array($length, [3, 4])) {
            throw new \InvalidArgumentException("CVV length must be 3 or 4");
        }

        return $this->formatString(str_repeat('{d}', $length));
    }

    private function calculateLuhnCheckDigit(string $number): int
    {
        $sum = 0;
        $isEvenPosition = true;

        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $digit = intval($number[$i]);

            if ($isEvenPosition) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
            $isEvenPosition = !$isEvenPosition;
        }

        return (10 - ($sum % 10)) % 10;
    }
}