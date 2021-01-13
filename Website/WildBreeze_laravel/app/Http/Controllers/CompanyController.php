<?php


namespace App\Http\Controllers;


class CompanyController extends Controller
{
    public function __construct()
    {

    }

    public function showAbout()
    {
        return view('/about', []);
    }
}
