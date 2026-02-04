@php
    // $page = \Illuminate\Support\Facades\DB::table('pages')->where('id', 33)->first();
    // $sections = \Illuminate\Support\Facades\DB::table('section')->where('page_id', 33)->get();
    // $banners = \Illuminate\Support\Facades\DB::table('banners')->get();
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

        .wanhu-books {
            justify-content: center;
        }
    </style>


    <section class="inner-book text-center">
        <div class="container">
            <h1>{{ $books->product_title }}</h1>
        </div>
    </section>

    <section class="about-books">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wanhu-books">
                        <div class="atropos my-atropos">
                            <div class="atropos-scale">
                                <div class="atropos-rotate">
                                    <div class="atropos-inner">
                                        <img src="{{ asset($books->image) }}" class="img-fluid" alt=""
                                            data-atropos-offset="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="wanhu-books-content">
                        {{-- <h3 class="typingheading">{{ $books->->name }}</h3> --}}
                        {!! $books->description !!}
                        <!--<a href="#" class="btn btn-web blue-btn">Learn more</a>-->
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('js')
@endsection
