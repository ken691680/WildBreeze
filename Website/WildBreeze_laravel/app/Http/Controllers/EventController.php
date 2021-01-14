<?php


namespace App\Http\Controllers;

/**
 * Class EventController
 * @package App\Http\Controllers\
 */
class EventController extends Controller
{
    public function __construct()
    {

    }

    public function showEventList()
    {
        return view('/event_list');
    }

    public function showEventInfo($id)
    {
        return view('/event_info');
    }

}
