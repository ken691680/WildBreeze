<?php

namespace App\Library;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * Class CommonLib
 * @package App\Library
 */
class CommonLib
{
    public function __construct()
    {

    }

    public function mergeCommonData(array $data = []): array
    {
        return array_merge([
            'user' => $user = Auth::user()
            ]
         , $data);
    }

}
