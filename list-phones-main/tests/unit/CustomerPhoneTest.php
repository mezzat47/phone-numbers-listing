<?php

use PHPUnit\Framework\TestCase;
use App\Entity\Customer;
use App\Libs\Parser;

class CustomerPhoneTest extends TestCase
{
    const VALIDATOR = [
        'Cameroon' => [
            'code' => '+237',
            'regex' => '\(237\)\ ?[2368]\d{7,8}$'
        ],
        'Ethiopia' => [
            'code' => '+251',
            'regex' => '\(251\)\ ?[1-59]\d{8}$'
        ],
        'Morocco' => [
            'code' => '+212',
            'regex' => '\(212\)\ ?[5-9]\d{8}$'
        ],
        'Mozambique' => [
            'code' => '+258',
            'regex' => '\(258\)\ ?[28]\d{7,8}$'
        ],
        'Uganda' => [
            'code' => '+256',
            'regex' => '\(256\)\ ?\d{9}$'
        ]
    ];

    public function testParsePhoneNumber(): void
    {
        $customer = new Customer();

        $customer->setPhone('(237) 697151594');

        $phone = [$customer->getPhone()];

        $parser = new Parser(self::VALIDATOR);
        
        $phones = $parser->map($phone);

        $this->assertArrayHasKey('country', $phones[0]);
        $this->assertArrayHasKey('state', $phones[0]);
        $this->assertArrayHasKey('code', $phones[0]);
        $this->assertArrayHasKey('number', $phones[0]);
    }
}