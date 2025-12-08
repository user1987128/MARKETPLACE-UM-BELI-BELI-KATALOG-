<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function adminGuide()
    {
        return view('guide.admin');
    }

    public function userGuide()
    {
        return view('guide.user');
    }
}
