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

    public function search(Request $request)
    {
        $request->flashOnly('keyword');
        $datas = 
        [
            'title' => 'Search',
        ];

        if(strlen($request->input('keyword')) > 0)
        {
            $keyword = $request->input('keyword');
            for($i = 0; $i < strlen($keyword); $i++)
            {
                if($keyword[$i] == ' ')
                {
                    $keyword[$i] = '+';
                }
            }
            $json_string = file_get_contents
                ('http://openlibrary.org/search.json?q=' . $keyword);
            $books = json_decode($json_string, true)['docs'];
            foreach($books as $i => $book)
            {
                if(!isset($book['cover_i']) || $book['cover_i'] < 0)
                {
                    Arr::pull($books, $i);
                }
            }
            $datas['books'] = $books;
            $request->session()->put('books', $books);
        }

        return view('pages.search', $datas);
    }
}