<?php

namespace App\Http\Controllers\manger;

use App\Http\Controllers\Controller;
use App\Maneger;
use App\Models\Attachment;
use App\Models\Book;
use App\Models\History;
use App\Notifications\details;
use App\Respons;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class mangerController extends Controller
{
    public function index()
    {
        $Notes = Maneger::all();
        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.manegers.index', compact('Notes','history'));
        }
    }

    public function create()
    {
        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.manegers.add_notes',compact('history'));
        }
    }

    public function edit(Request $request,$id)
    {
        $notes = Maneger::whereId($id)->get();
        $histories = History::all();
        foreach ( $histories as $history) {
        foreach ($notes as $note) {
            return view('pages.manegers.edit_notes', compact('note','history'));
        }

        }
    }

    public function store(Request $request)
    {
        $manger = new Maneger();

        $manger->title = $request->title;
        $manger->details = $request->details;

        $manger->save();


        if ($request->hasFile('file')) {

            $Notes_id = Maneger::latest()->first()->id;
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();

            $attachments = new Attachment();
            $attachments->file_name = $file_name;
            $attachments->Notes_id = $Notes_id;
            $attachments->save();


            $fille_image = $request->file->getClientOriginalName();
            $request->file->move(public_path('Attachments/Notes'), $fille_image);


        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('manger.index');

    }



    public function update(Request $request)
    {
        $manger = Maneger::findOrFail($request->id);
        $manger->title = $request->title;
        $manger->details = $request->details;

        $manger->save();




        toastr()->success(trans('messages.success'));
        return redirect()->route('manger.index');

    }


    public function show ($id){
        $books = Maneger::whereId($id)->get();
        $attachments = Attachment::where('Notes_id', $id)->get();
        foreach ($attachments as $attachment) {
            $file_name = $attachment->file_name;
            $book_file = Storage::disk('public_uploads_notes')->getDriver()->getAdapter()->applyPathPrefix($file_name);
            return  response()->file($book_file);
        }
    }




    public function destroy(request $request)
    {

        Maneger::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('manger.index');

    }


/******************************   email   *****************************/

    public function send( ){
        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.manegers.mail',compact('history'));
        }
    }


    public function email(Request $request){


        $detail = $request->details;

        $response = Respons::first();

       Notification::send($response, new details($detail));


        toastr()->success(trans('تم ارسال الايميل بنجاح'));
        return redirect()->route('manger.index');
    }



}
