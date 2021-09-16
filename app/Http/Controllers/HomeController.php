<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Evenement;
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
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $images = Image::latest()->paginate(6);
        $evenements = Evenement::all();
        return view('front.layout',compact('images','evenements'));
    }
}
