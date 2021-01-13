<?php


namespace App\Http\Controllers;


class SpotController extends Controller
{
    public function __construct()
    {
    }

    public function showSpotList()
    {
        return view('/spot_list', []);
    }

}
