<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Teacher;

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
        return view('home');
    }

    public function courses()
    {
        return view('courses');
    }

    public function teachers()
    {
        return view('teachers');
    }
    public function history()
    {
        return view('history');
    }

}
