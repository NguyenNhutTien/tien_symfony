<?php

namespace App\Tests\Utils;

use App\Utils\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @dataProvider addDataProvider()
     * @param $params
     * @param $expected
     */
    public function testAdd($params, $expected)
    {
        if (!is_numeric($params['a']) || !is_numeric($params['b'])) {
            $this->expectException($expected);
        }

        $calculator = new Calculator();
        $result = $calculator->add($params['a'], $params['b']);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals($expected, $result);
    }

    public function addDataProvider()
    {
        return [
            'happy-case-1' => [
                'params' => [
                    'a' => 10,
                    'b' => 20
                ],
                'expected' => 30
            ],
            'happy-case-2' => [
                'params' => [
                    'a' => 15,
                    'b' => 20
                ],
                'expected' => 35
            ],
            'a-empty' => [
                'params' => [
                    'a' => null,
                    'b' => 20
                ],
                'expected' => \TypeError::class
            ],
            'a-is-string' => [
                'params' => [
                    'a' => 'a',
                    'b' => 20
                ],
                'expected' => \TypeError::class
            ],
            'a-is-string-2' => [
                'params' => [
                    'a' => '1',
                    'b' => 20
                ],
                'expected' =>  21
            ]
        ];
    }
}
