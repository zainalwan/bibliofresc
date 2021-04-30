@extends('layouts.landing_page')

@section('content')
    <section class="hero container-fluid text-center">
        <div class="row mb-5">
            <div class="col">
                <h1 class="display-5">Open your mind, open your world</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="/search" method="get">
                    <div class="input-group search-keyword mb-3">
                        <input type="text" name="keyword" class="form-control fs-5"
                            placeholder="Book's title here..."
                            aria-describedby="button-addon2">
                        <button class="btn btn-primary fs-5" type="submit"
                            id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="book-list">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3 class="text-center mb-5">Book List</h3>
                    <div class="row">
                        @php
                            $i = 0
                        @endphp
                        @foreach($books as $book)
                            @php
                                if($i >= 6)
                                {
                                    break;
                                }
                            @endphp
                            <div class="col-md-4 mb-4">
                                <div class="card mx-auto">
                                    <img src="{{ 'http://covers.openlibrary.org/b/id/' . $book['cover_i'] . '-L.jpg' }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="#">{{ $book['title'] }}</a></h5>
                                        <h6 class="card-subtitle">{{ $book['author_name'][0] }}</h6>
                                    </div>
                                </div>
                            </div>
                            @php
                                $i++
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection