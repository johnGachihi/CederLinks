<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    /**
     * @dataProvider get_preview_provider
     */
    public function test_get_preview($htmlString, $expected)
    {
        $this->assertEquals(
            $expected,
            get_preview($htmlString)
        );
    }

    public function get_preview_provider()
    {
        return [
            ["<div>Ble Ble</div><p>La la</p>", "La la"],
            ["<div>Ble Ble</div><p>La la</p><a>holla</a>", "La la"],
            ["<div>Ble ble</div>", null]
        ];
    }
}
