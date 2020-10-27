<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use App\Course;
use App\TeacherCourse;
use App\History;
use Illuminate\Support\Facades\Http;
use Alaouy\Youtube\Facades\Youtube;

class WelcomeController extends Controller
{
    public function index(){
        try{
            $courses = Course::with('teachers')->get()->take(15);
            $teachers = Teacher::with('courses')->get()->take(15);    
            $history = History::all()->take(1);                           
            return view('welcome', compact(['courses', 'teachers', 'history']));
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
