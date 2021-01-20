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

    public function showShopCatalog()
    {
        return view('/shop_catalog', []);
    }

    public function showShopIntro()
    {
        return view('/shop_intro', []);
    }

    public function showShopHot()
    {
        return view('/shop_hot', []);
    }
}
