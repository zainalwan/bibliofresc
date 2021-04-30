<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PageController extends Controller
{
    public function index()
    {
        $json_string = file_get_contents
            ('http://openlibrary.org/search.json?q=mathematics');
        $books = json_decode($json_string, true)['docs'];
        foreach($books as $i => $book)
        {
            if(!isset($book['cover_i']) || $book['cover_i'] < 0)
            {
                Arr::pull($books, $i);
            }
        }
        $datas = [
            'books' => $books
        ];
        return view('pages.landing_page', $datas);
    }

    public function about()
    {
        return view('pages.about', ['title' => 'About']);
    }
}