<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display the main view
     */
    public function index()
    {
        return view("History.index");
    }
}
