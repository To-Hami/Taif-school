<?php

namespace App\Http\Controllers;

use App\Maneger;
use App\Models\Book;
use App\Models\History;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $studants = Student::all();
        $teachers = Teacher::all();
        $manger = Maneger::all();
        $Books = Book::all();
        $programs = Program::all();
        $histories = History::all();
        $student_problems = Student::whereHas('problems')->get();
        foreach ( $histories as $history){
            return view('dashboard',compact('studants','teachers','Books','programs','student_problems','manger','history'));

        }


    }
}
