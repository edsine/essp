<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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
        $metrics = [
            'employees' => auth()->user()->employees()->count(),
            'accident_claims' => ['amount' => 0, 'number'=> auth()->user()->accident_claims()->count()],
            'death_claims' => ['amount' => 0, 'number'=> auth()->user()->death_claims()->count()],
            'disease_claims' => ['amount' => 0, 'number'=> auth()->user()->disease_claims()->count()],
        ];
        return view('home', compact(['metrics']));
    }
}
