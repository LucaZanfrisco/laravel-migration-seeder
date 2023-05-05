<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        
        $trains = Train::all();

        return view('home', compact('trains'));
    }
    public function today(){

        $trains = Train::where('departure_time', '>=', today())->get();
        
        return view('today', compact('trains'));
    }
}
