@php
    $page = \Illuminate\Support\Facades\DB::table('pages')->where('id', 36)->first();
    $sections = \Illuminate\Support\Facades\DB::table('section')->where('page_id', 36)->get();
    $banners = \Illuminate\Support\Facades\DB::table('banners')->get();
@endphp

@extends('layouts.app')
@section('title', 'Home')

@section('css')
@endsection

@section('content')

    <style>
        .about-books {
            background-image: unset;
            height: auto;
        }
    </style>


    <section class="inner-book text-center">
        <div class="container">
            <h1>{{$page->name}}</h1>
        </div>
    </section>

    <section class="about-books">
        <div class="container" >
            <div class="row" >
                <div class="col-lg-12" >
                </div>
                <div class="col-lg-12" >
                    <div class="web-books" >
                        <h2 class="typingheading" data-text="Books">{{$page->name}}</h2>
                    </div>
                </div>
                @foreach ($blogs as $blog)
                <div class="col-lg-4">
                    <div class="book-list box" 
                        style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
                        <a href="{{ route('blog_detail', ['id' => $blog->id]) }}" id="show1" class="main-text-2">
                            <div class="book-img" >
                                {{-- @dd($blog->image) --}}
                                <img src="{{ $blog->image }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="book-name" >
                                <h5>
                                    {{$blog->name}}
                                </h5>
                            </div>
                        </a>

                    </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-4" >
                    <div class="book-list box" bis_skin_checked="1"
                        style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
                        <a href="" id="show3"
                            class="main-text-3">
                            <div class="book-img" bis_skin_checked="1">
                                <img src="uploads/products/2025100205090468deb1b08a121.png" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="book-name" bis_skin_checked="1">
                                <h5>
                                    Macabee Brothers
                                </h5>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col-lg-4" bis_skin_checked="1">
                    <div class="book-list box" bis_skin_checked="1"
                        style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
                        <a href="" id="show4"
                            class="main-text-4">
                            <div class="book-img" bis_skin_checked="1">
                                <img src="uploads/products/2025100205102168deb1fd0fa9f.png" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="book-name" bis_skin_checked="1">
                                <h5>
                                    Farmer Dell And Jezebell
                                </h5>
                            </div>
                        </a>

                    </div>
                </div> --}}
            </div>
        </div>
    </section>



@endsection

@section('js')
@endsection
