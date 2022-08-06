<?php

namespace App\Http\Controllers\programs;

use App\Http\Controllers\Controller;
use App\Http\Requests\programsRequest;
use App\Models\Attachment;
use App\Models\History;
use App\Models\Problem;
use App\Models\Program;
use App\Models\ProgramImage;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class programsController extends Controller
{
    public function index()
    {
        $programs = Program::all();

        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.Programs.index', compact('programs','history'));
        }
    }

    public function create()
    {

        $program = '';
        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.Programs.add_program', compact('program','history'));
        }
    }

    public function store(Request $request)
    {

        $program = new Program();

        $program->name = $request->name;
        $program->date = $request->date;
        $program->details = $request->details;
        $program->video = $request->video;
        $program->targets = $request->targets;
        $program->support = $request->support;
        $program->manager = $request->manager;
        $program->save();

        $prog = $program->latest()->first();

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $images) {
                $name = $images->getClientOriginalName();
                $images->storeAs('Attachments/programs/' . $program->id, $images->getClientOriginalName(), 'upload_attachments');
                //Image::make($name)->save(public_path('uploads/programs_images/' . $images->hashName()));
                $images = new ProgramImage();
                $images->images = $name;
                $images->images_id = $prog->id;
                $images->save();

            }


        }


        toastr()->success(trans('messages.success'));
        return redirect()->route('programs.index');


    }

    public function edit(Request $request, $id)
    {
        function getYoutubeId($url)
        {
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
            return isset($match[1])?$match[1]:null;
        }
        $programs = Program::where('id', $id)->first();
        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.Programs.edit_program', compact('programs','history'));
        }
    }

    public function update(Request $request, $id)
    {

        $progs = Program::all();
        $progs = Program::where('id', $id)->first();
        $progs->name = $request->name;
        $progs->date = $request->date;
        $progs->details = $request->details;
        $progs->video = $request->video;
        $progs->targets = $request->targets;
        $progs->support = $request->support;
        $progs->manager = $request->manager;
        $progs->save();


        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $images) {
                $name = $images->getClientOriginalName();
                $images->storeAs('Attachments/programs/' . $progs->id, $images->getClientOriginalName(), 'upload_attachments');
                //Image::make($name)->save(public_path('uploads/programs_images/' . $images->hashName()));
                $images = new ProgramImage();
                $images->images = $name;
                $images->images_id = $progs->id;
                $images->save();
            }
        }


        $programs = Program::all();
        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.Programs.index', compact('programs','history'));
        }
    }


    public function destroy(request $request)
    {
        $program =  Program::findOrFail($request->id);
        File::deleteDirectory(public_path('Attachments/programs/'. $program->id));
        Program::findOrFail($request->id)->delete();

        toastr()->success(trans('messages.Delete'));
        return redirect()->route('programs.index');

    }
    public function show(Request $request, $id){

        function getYoutubeId($url)
        {
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
            return isset($match[1])?$match[1]:null;
        }
        $histories = History::all();
        foreach ( $histories as $history){
            $programs = Program::where('id', $id)->first();

            return view('pages.Programs.show_program', compact('programs','history'));
        }


    }

}
