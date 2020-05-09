<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQuatity = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQuatity = $oldCart->totalQuatity;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){
		$giohang = ['quantity'=>0, 'price' => $item->selling_price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['quantity']++;
		$giohang['price'] = $item->selling_price * $giohang['quantity'];
		$this->items[$id] = $giohang;
		$this->totalQuatity++;
		$this->totalPrice += $item->selling_price;
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['quantity']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQuatity--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['quantity']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQuatity -= $this->items[$id]['quantity'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
