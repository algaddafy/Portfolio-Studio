<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Main;
use App\models\Portfolio;


class PagesController extends Controller
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


    public function index(){
        $main = Main::first();
        $portfolios = Portfolio::all();
        return view('pages.index',['main'=>$main, 'portfolios'=>$portfolios]);
    }




    public function dashboard(){
        return view('pages.dashboard');
    }
    public function services(){
        return view('pages.services');
    }
    public function portfolio(){
        return view('pages.portfolio');
    }
    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }
}