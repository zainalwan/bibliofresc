@extends('layouts.default')

@section('content')
    <div class="container container-min">
        <div class="row mt-5 mb-4">
            <div class="col-md-10 mx-auto">
                <h2 class="mb-3">{{ $title }}</h2>
            </div>
        </div>

        <div class="row mb-5 book-details">
            <div class="col-md-10 mx-auto">
                <div class="row">
                    <div class="col-md-4">
                        <img src="http://covers.openlibrary.org/b/id/{{ $book['cover_i'] }}-L.jpg" class="img-fluid" alt="{{ $book['title'] }}">
                    </div>
                    <div class="col ps-4">
                        <h5>Title</h5>
                        <h6>{{ $book['title'] }}</h6>
                        <h5 class="mt-4">Author(s)</h5>
                        <h6>
                            @php
                                $authors = '';
                                $author_counter = 0;
                                if(isset($book['author_name']))
                                {
                                    foreach($book['author_name'] as $author)
                                    {
                                        if($author_counter < sizeof($book['author_name']) - 1)
                                        {
                                            $authors = $authors . $author . ', ';
                                        }
                                        else
                                        {
                                            $authors = $authors . $author;
                                        }
                                        $author_counter++;
                                    }
                                }
                            @endphp
                            {{ $authors ? $authors : 'Unknown author' }}
                        </h6>
                        <h5 class="mt-4">Publisher(s)</h5>
                        <h6>
                            @php
                                $publishers = '';
                                $publisher_counter = 0;
                                if(isset($book['publisher']))
                                {
                                    foreach($book['publisher'] as $publisher)
                                    {
                                        if($publisher_counter < sizeof($book['publisher']) - 1)
                                        {
                                            $publishers = $publishers . $publisher . ', ';
                                        }
                                        else
                                        {
                                            $publishers = $publishers . $publisher;
                                        }
                                        $publisher_counter++;
                                    }
                                }
                            @endphp
                            {{ $publishers ? $publishers : 'Unknown publisher' }}
                        </h6>
                        <h5 class="mt-4">Language(s)</h5>
                        <h6>
                            @php
                                $languages = '';
                                $language_counter = 0;
                                if(isset($book['language']))
                                {
                                    foreach($book['language'] as $language)
                                    {
                                        if($language_counter < sizeof($book['language']) - 1)
                                        {
                                            $languages = $languages . $language . ', ';
                                        }
                                        else
                                        {
                                            $languages = $languages . $language;
                                        }
                                        $language_counter++;
                                    }
                                }
                            @endphp
                            {{ $languages ? $languages : 'Unknown language' }}
                        </h6>
                        <h5 class="mt-4">Subject(s)</h5>
                        <h6>
                            @php
                                $subjects = '';
                                $subject_counter = 0;
                                if(isset($book['subject']))
                                {
                                    foreach($book['subject'] as $subject)
                                    {
                                        if($subject_counter < sizeof($book['subject']) - 1)
                                        {
                                            $subjects = $subjects . $subject . ', ';
                                        }
                                        else
                                        {
                                            $subjects = $subjects . $subject;
                                        }
                                        $subject_counter++;
                                    }
                                }
                            @endphp
                            {{ $subjects ? $subjects : 'Unknown subject' }}
                        </h6>
                        <h5 class="mt-4">Publish Year</h5>
                        <h6>
                            @php
                                $publish_years = '';
                                $publish_year_counter = 0;
                                if(isset($book['publish_year']))
                                {
                                    foreach($book['publish_year'] as $publish_year)
                                    {
                                        if($publish_year_counter < sizeof($book['publish_year']) - 1)
                                        {
                                            $publish_years = $publish_years . $publish_year . ', ';
                                        }
                                        else
                                        {
                                            $publish_years = $publish_years . $publish_year;
                                        }
                                        $publish_year_counter++;
                                    }
                                }
                            @endphp
                            {{ $publish_years ? $publish_years : 'Unknown publish year' }}
                        </h6>
                        <h5 class="mt-4">ISBN</h5>
                        <h6>
                            @php
                                $isbns = '';
                                $isbn_counter = 0;
                                if(isset($book['isbn']))
                                {
                                    foreach($book['isbn'] as $isbn)
                                    {
                                        if($isbn_counter < sizeof($book['isbn']) - 1)
                                        {
                                            $isbns = $isbns . $isbn . ', ';
                                        }
                                        else
                                        {
                                            $isbns = $isbns . $isbn;
                                        }
                                        $isbn_counter++;
                                    }
                                }
                            @endphp
                            {{ $isbns ? $isbns : 'Unknown ISBN' }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection