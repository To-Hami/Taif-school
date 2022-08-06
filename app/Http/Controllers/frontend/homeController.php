<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class homeController extends Controller
{
    public function index()
    {
        $details = History::all();
        foreach ($details as $detail) {
            return view('frontend.index', compact('detail'));
        }
    }

    public function rules()
    {

        return $id = History::latest()->first();

        // return response()->file('Attachments/rules.pdf');
    }

    public function ershad()
    {

        $ershad = History::latest()->first()->attachment_ershad;

        $book_file = Storage::disk('public_uploads_setting_ershad')->getDriver()->getAdapter()->applyPathPrefix($ershad);
        return response()->file($book_file);

    }

    public function adds()
    {
        $histories = History::whereId(1)->get();
        foreach ($histories as $history) {
            $adds = $history->adds;
            $book_file = Storage::disk('public_uploads_setting_adds')->getDriver()->getAdapter()->applyPathPrefix($adds);
            return response()->file($book_file);
        }
    }

    public function slook()
    {

        $solook = History::latest()->first()->attachment_slook;

        $book_file = Storage::disk('public_uploads_setting_slook')->getDriver()->getAdapter()->applyPathPrefix($solook);
        return response()->file($book_file);
//        }
    }

    public function plans()
    {
        return $id = History::latest()->first()->attachment_ershad;

//        return response()->file('Attachments/plan.pdf');
    }

    public function library()
    {
        $details = History::all();
        $books = Book::all();
        foreach ($details as $detail) {
            return view('frontend.library', compact('books', 'detail'));
        }

    }


    public function image($id)
    {
        $books = Book::whereId($id)->get();
        foreach ($books as $book) {
            return view('frontend.image', compact('book'));
        }

    }

}
