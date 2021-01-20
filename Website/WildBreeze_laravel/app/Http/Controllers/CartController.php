<?php


namespace App\Http\Controllers;


class CartController extends Controller
{
    public function __construct()
    {

    }

    public function showCart()
    {
        return view('/cart', []);
    }

    public function showCartAtm()
    {
        return view('/cart_atm', []);
    }

    public function showCartCard()
    {
        return view('/cart_card', []);
    }

    public function showCartCardConfirm()
    {
        return view('/cart_card_confirm', []);
    }

    public function showCartAtmConfirm()
    {
        return view('/cart_atm_confirm', []);
    }

    public function showCartStep()
    {
        return view('/cart_step', []);
    }

    public function showCartComplete()
    {
        return view('/cart_complete', []);
    }

}
