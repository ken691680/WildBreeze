<?php

namespace App\Http\Controllers;

use App\Library\CommonLib;
use Illuminate\Support\Facades\Auth;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    private $commonLinb;

    public function __construct(CommonLib $commonLib)
    {
        $this->commonLinb = $commonLib;
    }

    public function showIndex()
    {

        return view('/index', $this->commonLinb->mergeCommonData());
    }
}
