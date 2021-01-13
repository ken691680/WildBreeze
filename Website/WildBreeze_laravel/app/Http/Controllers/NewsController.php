<?php


namespace App\Http\Controllers;

/**
 * Class NewsControllers
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    public function __construct()
    {
    }

    public function showNewsList()
    {
        return view('/news_list', []);
    }

    public function showNewsInfo()
    {
        return view('/news_info', []);
    }
}
