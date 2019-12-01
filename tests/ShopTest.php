<?php

class ShopTest extends \PHPUnit\Framework\TestCase
{
    public function testSum() {
        $x = 1;
        $y = 2;
        $this->assertEquals(3, $x + $y);
    }

    public function testSub() {
        $x = 1;
        $y = 2;
        $this->assertEquals(1, $y - $x);
    }
}