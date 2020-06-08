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
namespace Johnnguyen\Cart\Facades;

use Illuminate\Support\Facades\Facade;

class Cart extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cart';
    }
}
