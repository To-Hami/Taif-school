<?php

namespace App\Http\Controllers\books;

use App\Http\Controllers\Controller;
use App\Http\Requests\HistoryRequest;
use App\Maneger;
use App\Models\Attachment;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\History;
use App\Models\ProgramImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class booksController extends Controller
{

/***********************   index   *******************************************/


    public function index()
    {
        $books = Book::all();
        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.books.index', compact('books','history'));
        }
    }
    /***********************   create   *******************************************/

    public function create()
    {
        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.books.add_book',compact('history'));
        }
    }


    /***********************   store   *******************************************/

    public function store(Request $request)
    {

        $book = new Book();

        $book->name = $request->name;
        $book->details = $request->details;

        $book->save();

        if ($request->hasFile('attachment')) {

            $attachment_id = Book::latest()->first()->id;
            $image = $request->file('attachment');
            $file_name = $image->getClientOriginalName();

            $attachments = new Attachment();
            $attachments->file_name = $file_name;
            $attachments->attachment_id = $attachment_id;
            $attachments->save();

            // move pic

            $imageName = $request->attachment->getClientOriginalName();
            $request->attachment->move(public_path('Attachments/books'), $imageName);
        }


        // save books images


        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $images) {
                $name = $images->getClientOriginalName();
                $images->storeAs('Attachments/books/images/' . $book->id, $images->getClientOriginalName(), 'upload_attachments');
                $images = new BookImage();
                $images->images = $name;
                $images->images_id = $book->id;
                $images->save();

            }


        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('books.index');


    }



    /***********************   Update   *******************************************/

    public function update(Request $request)
    {
        $book = Book::findOrFail($request->id);

        $book->name = $request->name;
        $book->details = $request->details;

        $book->save();




        // save books images


        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $images) {
                $name = $images->getClientOriginalName();
                $images->storeAs('Attachments/books/images/' . $book->id, $images->getClientOriginalName(), 'upload_attachments');
                $images = new BookImage();
                $images->images = $name;
                $images->images_id = $book->id;
                $images->save();

            }


        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('books.index');


    }


    /***********************   edit   *******************************************/

    public function edit(Book $book)
    {
        $histories = History::all();
        foreach ( $histories as $history) {
            return view('pages.books.edit_book', compact('book','history'));
        }
    }

    public function showImage($id )
    {
         $books = Book::whereId($id)->get();
        $histories = History::all();
        foreach ( $histories as $history) {
            foreach ($books as $book) {
                return view('pages.books.showImage', compact('book','history'));

            }
        }


    }

    /***********************   view Book  *******************************************/

    public function view($id)

    {
        $books = Book::whereId($id)->get();
            $attachments = Attachment::where('attachment_id', $id)->get();
              foreach ($attachments as $attachment) {
                   $file_name = $attachment->file_name;
                   $book_file = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($file_name);
                return  response()->file($book_file);
        }

    }




    /***********************   download   *******************************************/


    public function download($id)
    {
        $books = Book::whereId($id)->get();
            $attachments = Attachment::where('attachment_id', $id)->get();
                foreach ($attachments as $attachment) {
                   $file_name = $attachment->file_name;
                   $contents = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($file_name);
                return response()->download($contents);
            }


    }


    /***********************   delete   *******************************************/

    public function destroy(Book  $book)

    {
       Storage::disk('public_uploads')->deleteDirectory('/images/'.$book->id);

        $book->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('books.index');

    }

}
