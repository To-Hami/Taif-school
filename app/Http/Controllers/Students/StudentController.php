<?php

namespace App\Http\Controllers\Students;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Imports\StudantImport;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grades\Grade;
use App\Models\History;
use App\Models\Level;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Problem;
use App\Models\Student;
use App\Models\Type_Blood;
use App\Models\Year;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{

    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }


    public function index()
    {
        return $this->Student->Get_Student();
    }


    public function create()
    {
        return $this->Student->Create_Student();
    }

    public function store(Request $request)
    {
        return $this->Student->Store_Student($request);
    }

    public function show($id)
    {

        return $this->Student->Show_Student($id);

    }


    public function edit($id )
    {
        $data['my_classes'] = Classroom::all();
//        $data['my_sections'] = Section::all();
        $data['Grades'] = Grade::all();
        $data['Years'] = Year::all();
        $data['parents'] = My_Parent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();
          $Studentss  = Student::findOrFail(['id' => $id]);

        foreach ( $Studentss as $Students){
            $histories = History::all();
            foreach ( $histories as $history) {
                return view('pages.Students.edit', $data, compact('Students','history'));
            }

        }

    }


    public function update(Request $request)
    {
        return $this->Student->Update_Student($request);
    }


    public function destroy(Request $request)
    {
        return $this->Student->Delete_Student($request);
    }

    public function Get_classrooms($id)
    {
        return $this->Student->Get_classrooms($id);
    }

    public function Get_Sections($id)
    {
        return $this->Student->Get_Sections($id);
    }

    public function Upload_attachment(Request $request)
    {
        return $this->Student->Upload_attachment($request);
    }

    public function Download_attachment($studentsname, $filename)
    {
        return $this->Student->Download_attachment($studentsname, $filename);
    }

    public function Delete_attachment(Request $request)
    {
        return $this->Student->Delete_attachment($request);

    }


    /************************************************   student problem  **********************************************/


    public function StudentProblems($id)
    {
        $student = Student::findOrFail($id);
        $levels = Level::all();
        $histories = History::all();
        foreach ( $histories as $history){

        }
        $problems = Problem::all();
        return view('pages.Students.problems', compact('student', 'levels', 'problems','history'));
    }


    public function updateProblems(Request $request)
    {


        $students = Student::findOrFail($request->id);
        $students->level_id = $request->level;
        $students->problems()->attach($request->problem_id, ['Notes' => $request->problem_details, 'Time' => $request->Joining_Date]);

        $students->save();

        $students = Student::all();

        $histories = History::all();
        foreach ( $histories as $history) {
        return view('pages.Students.index', compact('students','history'));
        }

    }

    /************************** import Excel   ******************************/

    public function importForm()
    {
        return view('pages.Students.import');
    }

    public function importExcel(Request $request)
    {
        Excel::import(new StudantImport(), $request->file);

        $students  = Student::all();
        return view('pages.Students.index', compact('students'));
    }
}
