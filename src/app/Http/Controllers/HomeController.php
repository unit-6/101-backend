<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Merchant;
use App\User;

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

    public function admin()
    {
        $data['title']  = 'Admins';
        $data['active'] = '2';
        $data['admins'] = User::all();

        if(Auth::user()->isActive == '2'){
            return view('pages.admin', $data);
        } else return redirect()->route('home');
    }

    public function merchant_deactive(Request $request)
    {
        if ($request->ajax()) {
            $merchant = Merchant::where('id', $request->id)->first();

            $merchant->isActive = '0';
            $merchant->save();
    
            return response()->json(array('success' => true));
        }
    }

    public function merchant_active(Request $request)
    {
        if ($request->ajax()) {
            $merchant = Merchant::where('id', $request->id)->first();

            $merchant->isActive = '1';
            $merchant->save();
    
            return response()->json(array('success' => true));
        }
    }
}
