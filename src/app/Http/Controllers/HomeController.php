<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['title']  = 'Dashboard';
        $data['active'] = '0';

        return view('pages.dashboard', $data);
    }

    public function merchant()
    {
        $data['title']  = 'Merchants';
        $data['active'] = '1';

        return view('pages.merchant', $data);
    }
}
