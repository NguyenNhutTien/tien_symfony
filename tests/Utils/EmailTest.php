<?php declare(strict_types=1);
namespace App\Tests\Utils;

use App\Utils\Email;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Promise\EachPromise;

class EmailTest extends TestCase
{

    /**
     * @dataProvider  dataProvider_1()
     * @param $params
     * @param $expected
     */
    public function testCanBeCreatedFromValidEmailAddress($params,$expected): void
    {
        $email = Email::getInstance($params['email']);
        $result = $email->fromString($params['email']);
        $this->assertInstanceOf($expected, $result );
    }

//    public function testCannotBeCreatedFromInvalidEmailAddress(): void
//    {
//
//        $this->expectException(InvalidArgumentException::class);
//        Email::fromString('invalid');
//    }
//
//    public function testCanBeUsedAsString(): void
//    {
//        $this->assertEquals(
//            'user@example.com',
//            Email::fromString('user@example.com')
//        );
//    }

    public function dataProvider_1()
    {
        return [
            'happy-case-1' => [
                'params' => [
                    'email' => 'user@example.com'
                ],
                'expected' => Email::class
            ]
        ];
    }
}


