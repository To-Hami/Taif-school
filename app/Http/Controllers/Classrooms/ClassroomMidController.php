<?php


namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroom;
use App\Imports\StudantImport;
use App\Imports\StudentClassroomsImport;
use App\Models\Classroom;

use App\Models\Classroom_mid;
use App\Models\Grades\Grade;
use App\Models\History;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClassroomMidController extends Controller
{


    public function index()
    {

        $My_Classes = Classroom_mid::all();
        $Grades = Grade::all();
        $histories = History::all();
        foreach ($histories as $history) {
            return view('pages.My_Classes.My_Classes', compact('My_Classes', 'Grades', 'history'));
        }

    }


    public function create()
    {

    }


    public function store(StoreClassroom $request)
    {
        //dd($request->all());
        $List_Classes = $request->List_Classes;

        try {

            $validated = $request->validated();
            foreach ($List_Classes as $List_Class) {

                $My_Classes = new Classroom();

                $My_Classes->Name_Class = $List_Class['Name_class'];

                $My_Classes->Grade_id = $List_Class['Grade_id'];

                $My_Classes->save();

            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }

    public function update(Request $request)
    {

        try {

            $Classrooms = Classroom::findOrFail($request->id);

            $Classrooms->update([

                $Classrooms->Name_Class = ['ar' => $request->Name, 'en' => $request->Name_en],
                $Classrooms->Grade_id = $request->Grade_id,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Classrooms.index');
        } catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }


    public function destroy(Request $request)
    {

        $Classrooms = Classroom::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');

    }


    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }


    public function Filter_Classes(Request $request)
    {
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('Grade_id', '=', $request->Grade_id)->get();
        return view('pages.My_Classes.My_Classes', compact('Grades'))->withDetails($Search);

    }


    public function students($id)
    {
        return view('pages.Students.classrooms_import', compact('id'));
    }

    public function importExcel(Request $request)
    {
        // return $request;

        Excel::import(new StudentClassroomsImport(), $request->file);

        $students = Student::all();

        $histories = History::all();
        foreach ($histories as $history) {
            return view('pages.Students.index', compact('students', 'history'));
        }
    }
}

?>
