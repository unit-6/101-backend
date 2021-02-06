<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merchant;

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
        $data['merchants'] = Merchant::all();
        $data['androidp'] = Merchant::where('platform', 'Android')->get();
        $data['iosp'] = Merchant::where('platform', 'iOS')->get();

        return view('pages.dashboard', $data);
    }

    public function merchant()
    {
        $data['title']  = 'Merchants';
        $data['active'] = '1';
        $data['merchants'] = Merchant::all();
        
        return view('pages.merchant', $data);
    }
}
