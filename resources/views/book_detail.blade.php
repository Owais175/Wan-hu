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


        .crossing-banner {
            background-image: url({{ asset($books->background_img) }});
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            z-index: 1;
        }

        .crossing-banner:before {
            position: absolute;
            z-index: -1;
            content: "";
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, black, transparent);
        }

        .crossing-banner .banner-content h2 {
            color: white !important;
            text-shadow: none !important;
            line-height: 66px;

        }

        .crossing-banner .banner-content p {
            color: white !important;
            width: 90%;
            line-height: 25px;
            font-size: 16px;
        }
    </style>


    <section class="inner-book text-center">
        <div class="container">
            <h1>{{ $books->product_title }}</h1>
        </div>
    </section>

    {{-- <section class="about-books">
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
                        {!! $books->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="inner-book-content wanhu-pg crossing-banner">
        <div class="animate-img cart1-img">
            {{-- <img src="{{ asset('asset/images/wan-caracter3.png') }}" class="img-fliud" alt=""> --}}
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <h2 class="typingheading">{{ $books->product_title }}</h2>
                        <!-- <h2>simply dummy text</h2> -->
                        {!! $books->description !!}
                    </div>
                    <div class="banner-btn">
                        <a href="{{ $books->link }}" class="btn btn-web blue-btn">Buy Now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-books">
                        <div class="books-wanhu">
                            <div class="atropos my-atropos">
                                <div class="atropos-scale">
                                    <div class="atropos-rotate">
                                        <div class="atropos-inner">
                                            <a href="JavaScript:;" id="show" class="main-text-1">
                                                <img src="{{ asset($books->image) }}" class="img-fluid" alt=""
                                                    data-atropos-offset="2">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="animate-img cart2-img">
            {{-- <img src="{{ asset('asset/images/wan-caracter4.png') }}" class="img-fliud" alt=""> --}}
        </div>
    </section>



@endsection

@section('js')
@endsection
