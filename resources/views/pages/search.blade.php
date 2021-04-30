@extends('layouts.default')

@section('content')
    <div class="container container-min">
        <div class="row mt-5 mb-5">
            <div class="col-md-10 mx-auto">
                <h2 class="mb-3">{{ $title }}</h2>
                <form action="/search" method="get">
                    <div class="row">
                        <div class="col-4 pe-0">
                            <input type="text" name="keyword" class="form-control" placeholder="Book's title here..." value="{{ old('keyword') }}">
                        </div>
                        <div class="col">
                            <button name="search" type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row search-result">
            <div class="col-md-10 mx-auto">
                @if(isset($books))
                    @if(sizeof($books) > 0)
                        @php
                            $book_counter = 0;
                        @endphp
                        @foreach($books as $book)
                            <div class="row mb-4">
                                <div class="col-3">
                                    <img src="http://covers.openlibrary.org/b/id/{{ $book['cover_i'] }}-L.jpg" class="img-fluid" alt="{{ $book['title'] }}">
                                </div>
                                <div class="col">
                                    <h5><a href="/details{{ $book['key'] }}">{{ $book['title'] }}</a></h5>
                                    <h6>
                                        @php
                                            $authors = '';
                                            $author_counter = 0;
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
                                            if(strlen($author) > 100)
                                            {
                                                $authors = substr($authors, 0, 100);
                                                $authors = $authors . '...';
                                            }
                                        @endphp
                                        {{ $authors }}
                                    </h6>
                                    <h6>
                                        @php
                                            $publishers = '';
                                            $publisher_counter = 0;
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
                                            if(strlen($publishers) > 100)
                                            {
                                                $publishers = substr($publishers, 0, 100);
                                                $publishers = $publishers . '...';
                                            }
                                        @endphp
                                        {{ $publishers }}
                                    </h6>
                                </div>
                            </div>
                            @php
                                $book_counter++;
                                if($book_counter >= 10)
                                {
                                    break;
                                }
                            @endphp
                        @endforeach
                    @else
                        <p>Data not found.</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection