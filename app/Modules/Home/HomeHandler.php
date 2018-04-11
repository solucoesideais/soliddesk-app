<?php

namespace App\Modules\Home;

use App\Http\Controllers\Controller;
use Library\Eloquent\Auth\Manager;
use Library\Eloquent\Auth\User;
use Library\Eloquent\Company;

class HomeHandler extends Controller
{
    public function __invoke()
    {
        return view('home::index');
    }
}