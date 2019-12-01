<?php

namespace app\tests;

use app\model\Carts;

class CartTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider providerCart
     *
     * @param $idx
     * @param $idProduct
     * @param $session
     */

    public function testCart($idx, $idProduct, $session)
    {
        $cart = new Carts($idx, $idProduct, $session);

        $this->assertEquals(
            [$idx, $idProduct, $session],
            [$cart->idx, $cart->idProduct, $cart->session]
        );
    }

    public function providerCart()
    {
        return array(
            ["idx" => 0, "idProduct" => 1, "session" => 'ne4seiichtvi46tlm004mlgbq9sdemu5'],
            ["idx" => 1, "idProduct" => 2, "session" => 'le6seiichtvi46tlm004mlgbq9sdemu6'],
            ["idx" => 2, "idProduct" => 3, "session" => 'de5seiichtvi46tlm004mlgbq9sdemu7']
        );
    }

    private $Cart;

    public function setUp()
    {
        $this->Cart = new Carts();
    }

    public function tearDown()
    {
        $this->Cart = null;
    }

    public function testTableCart()
    {
        $tableName = $this->Cart->getTableName();
        $this->assertEquals('carts', $tableName);
    }

    public function testGetCount()
    {
        $count = $this->Cart->getCount('4h68t03hohntte5qnale9h2a640dcjna');
        $this->assertEquals(2, $count);
    }

    public function testGetCost()
    {
        $cost = $this->Cart->getCostCart('4h68t03hohntte5qnale9h2a640dcjna');
        $this->assertEquals(25.60, $cost);
    }
}