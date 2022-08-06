<?php

namespace App\Http\Controllers\tameem;

use App\Http\Controllers\Controller;
use App\Maneger;
use App\Models\Attachment;
use App\Models\Book;
use App\Models\History;
use App\Models\Tameem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class tameemController extends Controller
{
    public function index()
    {
        $tameems = Tameem::all();
        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.tameem.index', compact('tameems','history'));
        }
    }

    public function create()
    {
        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.tameem.add_tameem',compact('history'));
        }
    }

    public function edit(Request $request,$id)
    {
        $tameems = Tameem::whereId($id)->get();
        $histories = History::all();
        foreach ( $histories as $history) {
        foreach ($tameems as $tameem) {
            return view('pages.tameem.edit_tameem', compact('tameem','history'));
        }

        }
    }

    public function store(Request $request)
    {
        $tameem = new Tameem();

        $tameem->title = $request->title;
        $tameem->details = $request->details;

        $tameem->save();


        if ($request->hasFile('file')) {

            $tameem_id = Tameem::latest()->first()->id;
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();

            $attachments = new Attachment();
            $attachments->file_name = $file_name;
            $attachments->Tameem_id = $tameem_id;
            $attachments->save();


            $fille_image = $request->file->getClientOriginalName();
            $request->file->move(public_path('Attachments/Tameem'), $fille_image);


        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('tameem.index');

    }



    public function update(Request $request)
    {
        $tameem = Tameem::findOrFail($request->id);
        $tameem->title = $request->title;
        $tameem->details = $request->details;

        $tameem->save();




        toastr()->success(trans('messages.success'));
        return redirect()->route('tameem.index');

    }


    public function show ($id){
        $tameem = Tameem::whereId($id)->get();
        $attachments = Attachment::where('Tameem_id', $id)->get();
        foreach ($attachments as $attachment) {
            $file_name = $attachment->file_name;
            $book_file = Storage::disk('public_uploads_tameem')->getDriver()->getAdapter()->applyPathPrefix($file_name);
            return  response()->file($book_file);
        }
    }




    public function destroy(request $request)
    {

        Tameem::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('tameem.index');

    }






}
