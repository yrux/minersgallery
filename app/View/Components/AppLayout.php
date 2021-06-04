<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Session;
class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $cartData = Session::get('cart');
        $cartTotal = 0;
        if($cartData){
            foreach($cartData as $cartDat){
                $cartTotal+=$cartDat['subtotal'];
            }
        }
        return view('layouts.app')->with(compact('cartTotal'));
    }
}
