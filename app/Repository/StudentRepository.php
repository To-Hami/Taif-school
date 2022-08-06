<?php

namespace App\Repository;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grades\Grade;
use App\Models\History;
use App\Models\Image;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use App\Models\Year;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class StudentRepository implements StudentRepositoryInterface
{


    public function Get_Student()
    {
        $students = Student::all();
        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.Students.index', compact('students','history'));
        }
    }
/*************************************   index   *******************************************/
    public function index()
    {
        $students = Student::all();
        return view('pages.Students.index', compact('students'));
    }

/********************************************  create    *******************************************/


    public function Create_Student()
    {
        $data['my_classes'] = Classroom::all();
        $data['Years'] = Year::all();
        $data['my_Grades'] = Grade::all();

        return view('pages.Students.add', $data);

    }


    /********************************************  Store_Student    *******************************************/

    public function Store_Student($request)
    {
        DB::beginTransaction();

        try {
            $students = new Student();
            $students->name = $request->name;
            $students->statues = $request->name;
            $students->porn_address = $request->porn_address;
            $students->Id_Number = $request->Id_Number;
            $students->date_end_id = $request->date_end_id;
            $students->nationality = $request->nationality;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->father = $request->father;
            $students->home_phone = $request->home_phone;
            $students->work_phone = $request->work_phone;
            $students->neighsbor = $request->neighsbor;
            $students->neighbor_address = $request->neighbor_address;
            $students->student_phone = $request->student_phone;
            $students->level_id = 1;
            $students->sub_classroom_id = 1;
            $students->Classroom_id = $request->Classroom_id;
            $students->academic_year = $request->academic_year;
            $students->save();

            // insert img
            if ($request->hasfile('photos')) {
                foreach ($request->file('photos') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('Attachments/students/' . $students->name, $file->getClientOriginalName(), 'upload_attachments');

                    // insert in image_table
                    $images = new Image();
                    $images->filename = $name;
                    $images->imageable_id = $students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit(); // insert data
            toastr()->success(trans('messages.success'));
            return redirect()->route('Students.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /********************************************  edit    *******************************************/

    public function Edit_Student($request)
    {
        return $request;
        $data['my_classes'] = Classroom::all();
//        $data['my_sections'] = Section::all();
        $data['Grades'] = Grade::all();
        $data['Years'] = Year::all();
        $data['parents'] = My_Parent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();
        $Students  = Student::findOrFail($request->id);
        return view('pages.Students.edit', $data, compact('Students'));
    }

    /********************************************  update    *******************************************/

    public function Update_Student($request)
    {
        try {
            $students = Student::findorfail($request->id);
            $students->name = $request->name;
            $students->statues = $request->name;
            $students->porn_address = $request->porn_address;
            $students->Id_Number = $request->Id_Number;
            $students->date_end_id = $request->date_end_id;
            $students->nationality = $request->nationality;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->father = $request->father;
            $students->home_phone = $request->home_phone;
            $students->work_phone = $request->work_phone;
            $students->neighsbor = $request->neighsbor;
            $students->neighbor_address = $request->neighbor_address;
            $students->student_phone = $request->student_phone;
            $students->level_id = 1;
            $students->sub_classroom_id = 1;
            $students->Classroom_id = $request->Classroom_id;
            $students->academic_year = $request->academic_year;
            $students->save();



            toastr()->success(trans('messages.Update'));
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['success' => $e->getMessage()]);
        }
    }


    /********************************************  show    *******************************************/


    public function Show_Student($id)
    {
        $Student = Student::findorfail($id);
        return view('pages.Students.show', compact('Student'));
    }

    /********************************************  Get_classrooms    *******************************************/

    public function Get_classrooms($id)
    {

        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;

    }

    /********************************************  Get_Sections    *******************************************/
    public function Get_Sections($id)
    {

        $list_sections = Section::where("Class_id", $id)->pluck("Name_Section", "id");
        return $list_sections;
    }

    /********************************************  delete    *******************************************/

    public function Delete_Student($request)
    {

        Student::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Students.index');
    }


    /********************************************  attachment    *******************************************/

    public function Upload_attachment($request)
    {
        foreach ($request->file('photos') as $file) {
            $name = $file->getClientOriginalName();
            $file->storeAs('Attachments/students/' . $request->student_name, $file->getClientOriginalName(), 'upload_attachments');

            // insert in image_table
            $images = new image();
            $images->filename = $name;
            $images->imageable_id = $request->student_id;
            $images->imageable_type = 'App\Models\Student';
            $images->save();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('Students.show', $request->student_id);
    }

    /********************************************  Download_attachment    *******************************************/

    public function Download_attachment($studentsname, $filename)
    {
        return response()->download(public_path('Attachments/students/' . $studentsname . '/' . $filename));
    }

    /********************************************  Delete_attachment    *******************************************/

    public function Delete_attachment($request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('Attachments/students/' . $request->student_name . '/' . $request->filename);

        // Delete in data
        image::where('id', $request->id)->where('filename', $request->filename)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Students.show', $request->student_id);
    }


}
