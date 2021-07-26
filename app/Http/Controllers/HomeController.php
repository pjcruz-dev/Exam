<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('home', ['contacts' => $contacts]);
    }
}
