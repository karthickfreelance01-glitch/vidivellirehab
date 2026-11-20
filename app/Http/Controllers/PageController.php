<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', ['active' => 'home']);
    }

    public function about()
    {
        return view('pages.about', ['active' => 'about']);
    }

    public function deAddiction()
    {
        return view('pages.de-addiction', ['active' => 'de-addiction']);
    }

    public function rehabilitation()
    {
        return view('pages.rehabilitation', ['active' => 'rehabilitation']);
    }

    public function individualCounselling()
    {
        return view('pages.individual-counselling', ['active' => 'individual-counselling']);
    }

    public function gallery()
    {
        return view('pages.gallery', ['active' => 'gallery']);
    }
}
