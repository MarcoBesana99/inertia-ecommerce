<?php

namespace App\Helpers;

use App\Models\Product;

class Cart
{
    public function __construct()
    {
        if ($this->get() === null)
            $this->set($this->empty());
    }

    public function add(Product $product): void
    {
        //get curretn cart
        $cart = $this->get();
        //transform to array product passed as param
        $product = $product->toArray();
        //take all ids of the products in the cart
        $ids = array_column($cart['products'], 'id');
        //check if the product is in the cart checking the id
        if (in_array($product['id'], $ids)) {
            //increase product quantity
            $cart['products'][array_search($product['id'], array_column($cart['products'], 'id'))]['quantity'] ++;
        } else {
            //add the product to the cart
            $product['quantity'] = 1;
            array_push($cart['products'], $product);
        }
        //set the updated cart
        $this->set($cart);
    }

    public function remove(Product $product): void
    {
        //get curretn cart
        $cart = $this->get();
        //transform to array product passed as param
        $product = $product->toArray();
        //product quantity
        $quantity = &$cart['products'][array_search($product['id'], array_column($cart['products'], 'id'))]['quantity'];
        //take all ids of the products in the cart
        $ids = array_column($cart['products'], 'id');
        //check if the product is in the cart checking the id
        if (in_array($product['id'], $ids)) {
            if ($quantity > 1)
                //decrease product quantity
                $quantity --;
            else
                //delete product from cart
                array_splice($cart['products'], array_search($product['id'], array_column($cart['products'], 'id')), 1);
        }
        $this->set($cart);
    }

    public function clear(): void
    {
        $this->set($this->empty());
    }

    public function empty(): array
    {
        return [
            'products' => [],
        ];
    }

    public function get(): ?array
    {
        return request()->session()->get('cart');
    }

    private function set($cart): void
    {
        request()->session()->put('cart', $cart);
    }
}
