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
namespace Johnnguyen\Cart\Contracts;

interface Buyable
{
    /**
     * Get the identifier of the Buyable item.
     *
     * @return int|string
     */
    public function getBuyableIdentifier($options = null);

    /**
     * Get the description or title of the Buyable item.
     *
     * @return string
     */
    public function getBuyableDescription($options = null);

    /**
     * Get the price of the Buyable item.
     *
     * @return float
     */
    public function getBuyablePrice($options = null);
}