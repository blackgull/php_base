<?php

namespace app\tests;
use app\model\Products;

class ProductTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider providerProduct
     *
     * @param $idx
     * @param $name
     * @param $description
     * @param $price
     * @param $image
     */

    public function testProduct($idx, $name, $description, $price, $image)
    {
        $product = new Products($idx, $name, $description, $price, $image);

        $this->assertEquals(
            [$idx, $name, $description, $price, $image],
            [$product->idx, $product->name, $product->description, $product->price, $product->image]
        );
    }

    public function providerProduct()
    {
        return array(
            ["idx" => 0, "name" => 'Линейка', "description" => '20 см', "price" => 20.50, "image" => 'line.jpg'],
            ["idx" => 1, "name" => 'Ручка', "description" => 'Синяя', "price" => 30.00, "image" => 'pen.jpg'],
            ["idx" => 2, "name" => 'Ластик', "description" => 'Резиновый', "price" => 15.00, "image" => 'last.jpg']
        );
    }

    public function testTableProduct()
    {
        $product = new Products();
        $tableName = $product->getTableName();
        $this->assertEquals('products', $tableName);
    }
}