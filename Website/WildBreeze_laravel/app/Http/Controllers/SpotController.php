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

    public function showSpotInfo($id)
    {
        return view('/spot_info', []);
    }

}
