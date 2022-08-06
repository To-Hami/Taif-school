<?php

namespace App\Http\Controllers\history;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Book;
use App\Models\Grades\Grade;
use App\Models\History;
use App\Models\ProgramImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class historyController extends Controller
{
    public function index()
    {
        $history = History::get()->first();
        return view('pages.history.index', compact('history'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('pages.history.add_history', compact('grades'));
    }


    public function update(Request $request, $id)
    {

        $history = History::where('id', $id)->first();


        /************************  slook   ******************************/


        if ($request->hasFile('attachment_slook')) {
//
//
            Storage::disk('public_uploads_setting_slook')->delete('/' . $history->attachment_slook);

            $TheFile = $request->attachment_slook->getClientOriginalName();
            $request->attachment_slook->move(public_path('/Attachments/setting/slook/'), $TheFile);

            $attachment_slook = $request->file('attachment_slook');
            $file_attachment_slook = $attachment_slook->getClientOriginalName();
            $history->attachment_slook = $file_attachment_slook;
            $history->save();

        }

        /***********************  ershad   *************************************/

        if ($request->hasFile('attachment_ershad')) {

            Storage::disk('public_uploads_setting_ershad')->delete('/' . $history->attachment_ershad);

            $TheFile = $request->attachment_ershad->getClientOriginalName();
            $request->attachment_ershad->move(public_path('Attachments/setting/ershad'), $TheFile);

            $attachment_ershad = $request->file('attachment_ershad');
            $file_attachment_ershad = $attachment_ershad->getClientOriginalName();

            $history->attachment_ershad = $file_attachment_ershad;
            $history->save();

        }



        /********************  adds  ******************************/

        if ($request->hasFile('adds')) {

            Storage::disk('public_uploads_setting_adds')->delete('/' . $history->adds);

            $TheFile = $request->adds->getClientOriginalName();
            $request->adds->move(public_path('Attachments/setting/adds'), $TheFile);

            $history->adds = $request->adds->getClientOriginalName();
            $history->save();
        }


        $history->name = $request->name;
        $history->grade = $request->grade;
        $history->manager_name = $request->manager_name;
        $history->manager_email = $request->manager_email;
        $history->number = $request->number;
        $history->region = $request->region;
        $history->direct = $request->direct;
        $history->location = $request->address;


        $history->save();

        toastr()->success(trans('messages.success'));
        return view('pages.history.index', compact('history'));
    }

//    public function create    ()
//    {
//
//        $program = '';
//        return view('Pages.Programs.add_program', compact('program'));
//    }
//
//    public function store(Request $request)
//    {
//
//        $program = new Program();
//
//        $program->name = $request->name;
//        $program->date = $request->date;
//        $program->details = $request->details;
//        $program->video = $request->video;
//        $program->targets = $request->targets;
//        $program->support = $request->support;
//        $program->manager = $request->manager;
//        $program->save();
//
//        $prog = $program->latest()->first();
//
//        if ($request->hasfile('images')) {
//            foreach ($request->file('images') as $images) {
//                $name = $images->getClientOriginalName();
//                $images->storeAs('Attachments/programs/' . $program->name, $images->getClientOriginalName(), 'upload_attachments');
//                //Image::make($name)->save(public_path('uploads/programs_images/' . $images->hashName()));
//                $images = new ProgramImage();
//                $images->images = $name;
//                $images->images_id = $prog->id;
//                $images->save();
//
//            }
//
//
//        }
//
//
//        toastr()->success(trans('messages.success'));
//        return redirect()->route('programs.index');
//
//
//    }
//
//    public function edit(Request $request, $id)
//    {
//        function getYoutubeId($url)
//        {
//            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
//            return isset($match[1])?$match[1]:null;
//        }
//        $programs = Program::where('id', $id)->first();
//
//        return view('Pages.Programs.edit_program', compact('programs'));
//    }
//
//    public function update(Request $request, $id)
//    {
//
//        $progs = Program::all();
//        $progs = Program::where('id', $id)->first();
//        $progs->name = $request->name;
//        $progs->date = $request->date;
//        $progs->details = $request->details;
//        $progs->video = $request->video;
//        $progs->targets = $request->targets;
//        $progs->support = $request->support;
//        $progs->manager = $request->manager;
//        $progs->save();
//
//
//        if ($request->hasfile('images')) {
//            foreach ($request->file('images') as $images) {
//                $name = $images->getClientOriginalName();
//                $images->storeAs('Attachments/programs/' . $progs->name, $images->getClientOriginalName(), 'upload_attachments');
//                //Image::make($name)->save(public_path('uploads/programs_images/' . $images->hashName()));
//                $images = new ProgramImage();
//                $images->images = $name;
//                $images->images_id = $progs->id;
//                $images->save();
//            }
//        }
//
//
//        $programs = Program::all();
//        return view('Pages.Programs.index', compact('programs'));
//    }
//
//
//    public function destroy(request $request)
//    {
//
//        Program::findOrFail($request->id)->delete();
//        toastr()->error(trans('messages.Delete'));
//        return redirect()->route('programs.index');
//
//    }

}
