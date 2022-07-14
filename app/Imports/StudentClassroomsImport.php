<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use phpDocumentor\Reflection\Types\Collection;

class StudentClassroomsImport implements ToCollection
{





    public function collection(\Illuminate\Support\Collection $rows)
    {



        $grade_id = request()->route()->parameters['grade_id'];
        $class_id = request()->route()->parameters['class_id'];



        $rows->each(function ($data, $value) {

            if ($value > 20) {

                $student = new Student();
                $student->name = $data[28] ?? null;
                $student->statues = $data[27] ?? null;
                $student->porn_address = $data[25] ?? null;
                $student->Date_Birth = $data[24] ?? null;
                $student->nationality = $data[23] ?? null;
                $student->Id_Number = $data[20] ?? null;
                $student->date_end_id = $data[19] ?? null;
                $student->sub_classroom_id = $data[18] ?? null;
                $student->father = $data[16] ?? null;
                $student->home_phone = $data[15] ?? null;
                $student->work_phone = $data[12] ?? null;
                $student->neighsbor = $data[8] ?? null;
                $student->neighbor_address = $data[5] ?? null;
                $student->student_phone = $data[2] ?? null;


                $student->Grade_id = request()->route()->parameters['grade_id'];
                $student->Classroom_id =request()->route()->parameters['class_id'];
                $student->save();

            }//end of if

        });//end if each


    }//end of collection

}//end of class
