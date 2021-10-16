<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Driver\Session;

class giohang extends Model
{

    public $items = null;
    public $totalQty = 0; // tong so luong san pham
    public $totalPrice = 0; // tong gia san pham

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id, $qty_p){
        $giohang = ['qty'=>0, 'price' => 0, 'item' => $item];

        if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
            }
        }
        $giohang['qty'] += $qty_p;

        $giohang['price']  += $qty_p *$item->sale_price_product *((100-$item->sale)/100);
        $this->items[$id] = $giohang;
        $this->totalQty++;
        $this->totalPrice += $item->sale_price_product * $qty_p*((100-$item->sale)/100);
    }

    // update cart
    public function update_cart($id,$newQty){
        $present_qty = $this->items[$id]['qty'];

        if( $present_qty > $newQty){
            $this->items[$id]['qty'] = $newQty;
            $this->items[$id]['price'] = $this->items[$id]['item']['sale_price_product']*((100-$this->items[$id]['item']['sale'])/100) * $newQty;
            $cut = $present_qty - $newQty; //chenh lech so luong
            $this->totalQty -= $cut;
            $this->totalPrice -= $this->items[$id]['item']['sale_price_product']*((100-$this->items[$id]['item']['sale'])/100) * $cut;

            if($this->items[$id]['qty']<=0){
                unset($this->items[$id]);
            }
        }

        if($present_qty < $newQty){
            $this->items[$id]['qty'] = $newQty;
            $this->items[$id]['price'] = $this->items[$id]['item']['sale_price_product']*((100-$this->items[$id]['item']['sale'])/100) * $newQty;
            $add = $newQty - $present_qty;
            $this->totalQty += $add;
            $this->totalPrice += $this->items[$id]['item']['sale_price_product']*((100-$this->items[$id]['item']['sale'])/100) * $add;
            if($this->items[$id]['qty']<=0){
                unset($this->items[$id]);
            }
        }

    }
    //xóa 1
    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['sale_price_product'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['sale_price_product'];
        if($this->items[$id]['qty']<=0){
            unset($this->items[$id]);
        }
    }
    //xóa nhiều
    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
