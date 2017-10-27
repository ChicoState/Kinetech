<?php

namespace App;

class Cart
{
	//group of products
	public $items = [];
	public $totalQuant = 0;
	public $totalPrice = 0;

	public function __construct($oldCart)
	{
		if(isset($oldCart) && !empty($oldCart))
		{
			$this->items      = $oldCart->items;
			$this->totalQuant = $oldCart->totalQuant;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function resetCart()
	{
		$this->totalPrice = 0;
		$this->totalQuant = 0;
		$this->items = [];
	}

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

	public function removeAll($id)
	{
		$index = array_search($this->items[$id], $this->items);
		$price = $this->items[$id]['price'] * $this->items[$id]['qty'];
		if(isset($index))
		{
			if($this->totalPrice < $price)
			{
				$this->totalPrice = 0;
			}
			else $this->totalPrice -= $price;
		 	$this->totalQuant -= $this->items[$id]['qty'];
		 	unset($this->items[$index]);
		}
	}
}