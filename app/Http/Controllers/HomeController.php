<?php

namespace App\Http\Controllers;

use App\Models\basket;
use App\Models\bola;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $baskets = basket::all();
        $bolas = bola::all();
        return view('layouts.home', compact('baskets', 'bolas'));
    }

    public function about()
    {
        return view('layouts.about');
    }
}
