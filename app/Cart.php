<?php

namespace App;
use App\Product;

class Cart

{
    public $items = NULL;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    public function add($item, $id)
    {
        $product = Product::find($id);
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if(array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        if ( $storedItem['qty'] < $product->quantity) {
            $storedItem['qty']++;
            $this->totalQty++;
            $storedItem['price'] = $item->price * $storedItem['qty'];
            $this->totalPrice +=  $item->price;
        }
        $storedItem['qty'];
        $storedItem['price'];
        $this->items[$id] = $storedItem;
        $this->totalQty;
        $this->totalPrice;
    }
}