<?php

namespace App;

class Cart
{
    public $items=null;
    public $totalQty=0;
    public $totalAmount=0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items=$oldCart->items;
            $this->totalQty=$oldCart->totalQty;
            $this->totalAmount=$oldCart->totalAmount;
        }
    }

    public function addCart($id,$post){
        $storeItem=['item'=>$post,'qty'=>0,'amount'=>$post->price];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storeItem=$this->items[$id];
            };

        }
        $storeItem['qty']++;
        $storeItem['amount']=$storeItem['qty']*$post->price;
        $this->items[$id]=$storeItem;
        $this->totalQty++;
        $this->totalAmount+=$storeItem['qty']*$post->price;
    }
    public function increase($id){
        $this->items[$id]['qty']++;
        $this->items[$id]['amount']+=$this->items[$id]['item']->price;
        $this->totalQty++;
        $this->totalAmount+=$this->items[$id]['item']->price;
    }
    public function decrease($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['amount']-=$this->items[$id]['item']->price;
        $this->totalQty--;
        $this->totalAmount-=$this->items[$id]['item']->price;
        if($this->items[$id]['qty']<1){
            unset($this->items[$id]);
        }
    }
}
