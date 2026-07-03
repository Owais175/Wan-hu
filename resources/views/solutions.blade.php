@php
    $page = \Illuminate\Support\Facades\DB::table('pages')->where('id', 40)->first();
    $sections = \Illuminate\Support\Facades\DB::table('section')->where('page_id', 40)->get();
    $banners = \Illuminate\Support\Facades\DB::table('banners')->get();
@endphp

@extends('layouts.app')
@section('title', 'Home')
<link rel="canonical" href="https://roymontzauthor.com/solutions" />
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
        <div class="sides-animation farmer-img">
            <img src="" class="img-fluid" alt="">
        </div>
        <div class="sides-animation farmer1-img">
            <img src="" class="img-fluid" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wanhu-books-content">
                        {{-- @dd($page->name); --}}
                        {{-- <h3 class="typingheading">{{$page->name}}</h3> --}}
                        {!!$page->content!!}
                        <!--<a href="#" class="btn btn-web blue-btn">Learn more</a>-->
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('js')
@endsection
