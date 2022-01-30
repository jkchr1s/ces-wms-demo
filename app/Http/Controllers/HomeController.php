<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Renders the index page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }
}
