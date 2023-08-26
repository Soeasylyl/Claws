<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Price;
use Illuminate\Http\Request;

class NotationsController extends Controller
{
    public function getDataNotations()
    {
        $clients = Client::all();
        $prices = Price::all();
        return view('pages/notation', compact('clients', 'prices'));
    }
}
