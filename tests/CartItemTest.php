<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade john theme to newer
 * versions in the future.
 *
 * @category    John
 * @package     shopping cart
 * @author      John Nguyen
 * @copyright   Copyright (c) John Nguyen
 */ 
namespace Johnnguyen\Tests\Cart;
use Orchestra\Testbench\TestCase;
use Johnnguyen\Cart\CartItem;
use Johnnguyen\Cart\CartServiceProvider;

class CartItemTest extends TestCase
{
    /**
     * Set the package service provider.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [CartServiceProvider::class];
    }

    /** @test */
    public function it_can_be_cast_to_an_array()
    {
        $cartItem = new CartItem(1, 'Some item', 10.00, ['size' => 'XL', 'color' => 'red']);
        $cartItem->setQuantity(2);

        $this->assertEquals([
            'id' => 1,
            'name' => 'Some item',
            'price' => 10.00,
            'rowId' => '07d5da5550494c62daf9993cf954303f',
            'qty' => 2,
            'options' => [
                'size' => 'XL',
                'color' => 'red'
            ],
            'tax' => 0,
            'subtotal' => 20.00,
        ], $cartItem->toArray());
    }

    /** @test */
    public function it_can_be_cast_to_json()
    {
        $cartItem = new CartItem(1, 'Some item', 10.00, ['size' => 'XL', 'color' => 'red']);
        $cartItem->setQuantity(2);

        $this->assertJson($cartItem->toJson());

        $json = '{"rowId":"07d5da5550494c62daf9993cf954303f","id":1,"name":"Some item","qty":2,"price":10,"options":{"size":"XL","color":"red"},"tax":0,"subtotal":20}';

        $this->assertEquals($json, $cartItem->toJson());
    }
}