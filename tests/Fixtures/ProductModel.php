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
namespace Johnnguyen\Tests\Cart\Fixtures;

class ProductModel
{
    public $someValue = 'Some value';

    public function find($id)
    {
        return $this;
    }
}