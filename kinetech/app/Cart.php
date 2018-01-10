<?php

namespace App;

/**
 * @author     Elliott Allmann <elliott.allmann@gmail.com>
 * @brief Cart class that implements our shopping cart.
 * @details Custom class that implemetns our shopping cart.
 * 
 */
class Cart
{
	//group of products
	public $items = [];
	public $totalQuant = 0;
	public $totalPrice = 0;

	/**
	 * Constructor.
	 * Takes the old cart as a a param if it.
	 * If it passes NULL, then we have an empty cart.
	 * Otherwise, we update the current cart values to those
	 * of the old cart.
	 * 
	 */
	public function __construct($oldCart)
	{
		if(isset($oldCart) && !empty($oldCart))
		{
			$this->items      = $oldCart->items;
			$this->totalQuant = $oldCart->totalQuant;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	/**
	 * @brief Reset
	 * @details Reset all member attributes of the cart
	 * to 0.
	 * @return None
	 */
	public function resetCart()
	{
		$this->totalPrice = 0;
		$this->totalQuant = 0;
		$this->items = [];
	}

	/**
	 *	Adds a given item by the ID to the cart. 
	 */
	public function add($item, $id)
	{
		$storedItem =  ['qty' => 0, 'price' => $item->price, 'item' => $item ];
		if($this->items)
		{
			if(array_key_exists($id, $this->items))
			{
				$storedItem = $this->items[$id];
			}
		}
		$storedItem['qty']++;
		$storedItem['price'] = $item->price;
		$this->items[$id] = $storedItem;
		$this->totalQuant++;
		$this->totalPrice += $storedItem['price'];
	}

	/**
	 * Removes one of an element from the cart.
	 * If there is only one of the element left, 
	 * we call removeAll().
	 * Will chance the price and quantity of items.
	 */
	public function removeOne($id)
	{
		if(array_key_exists($id, $this->items))
		{
			//if there is only one item left
			if($this->items[$id]['qty'] == 1)
			{
				$this->removeAll($id);
				return;
			}
			else $this->items[$id]['qty'] -= 1;
		}
		$this->items = $this->items;
		$this->totalQuant -= 1;
		$this->totalPrice -= $this->items[$id]['price'];
	}

	/**
	 * Removes all of a given element from the cart.
	 * Will chance the price and quantity of items.
	 */
	public function removeAll($id)
	{
		$index = array_search($this->items[$id], $this->items);
		$price = $this->items[$id]['price'] * $this->items[$id]['qty'];
		if(isset($index))
		{
			if($this->totalPrice <= $price)
			{
				$this->totalPrice = 0;
			}
			else $this->totalPrice -= $price;
		 	$this->totalQuant -= $this->items[$id]['qty'];
		 	unset($this->items[$index]);
		}
	}

	/**
	 * @brief Get total Quantity
	 * @details Returns the total quantity of items in the cart.
	 * @return $this->totalQuant : int
	 */
	public function getTotalQuantity()
	{
		return $this->totalQuant;
	}

	public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function getItems()
    {
        return $this->items;
    }
}