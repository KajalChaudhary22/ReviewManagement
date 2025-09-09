<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    protected function home()
    {
        return view('home.welcome');
    }
    protected function categories()
    {
        return view('home.categories');
    }
    protected function blogs()
    {
        return view('home.blog');
    }
    protected function aboutUs()
    {
        return view('home.about_us');
    }
}
