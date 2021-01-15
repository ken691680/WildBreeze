<?php


namespace App\Http\Controllers;


class ShopController extends Controller
{
    public function __construct()
    {

    }

    public function showShop()
    {
        return view('/shop', []);
    }
}
