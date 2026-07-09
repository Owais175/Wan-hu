@php
    $page = \Illuminate\Support\Facades\DB::table('pages')->where('id', 43)->first();
    $sections = \Illuminate\Support\Facades\DB::table('section')->where('page_id', 43)->get();
    $banners = \Illuminate\Support\Facades\DB::table('banners')->get();
    $website_name =
        \Illuminate\Support\Facades\DB::table('m_flag')->where('id', 5)->first()?->flag_value ??
        'Global Self Book Publishing';
    $website_email =
        \Illuminate\Support\Facades\DB::table('m_flag')->where('id', 1)->first()?->flag_value ??
        'info@globalselfbookpublishing.com';
    $website_phone = \Illuminate\Support\Facades\DB::table('m_flag')->where('id', 2)->first()?->flag_value ?? '';
@endphp

@extends('layouts.app')
@section('title', 'Home')
@section('canonical', 'https://roymontzauthor.com/opt-in-opt-out-policy')
@section('css')
@endsection

@section('content')

    <style>
        .about-books {
            background-image: unset;
            height: auto;
        }
    </style>
    <style>
        /* ============================
               Opt In / Opt Out Page Style
            ============================ */

        .wanhu-books-content.opt-content {
            max-width: 950px;
            margin: 60px auto;
            padding: 45px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, .08);
            font-family: "Poppins", sans-serif;
            color: #444;
            line-height: 1.9;
        }

        /* Main Heading */
        .wanhu-books-content.opt-content h2 {
            font-size: 38px;
            font-weight: 700;
            color: #0d3b66;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #0d3b66;
            text-align: center;
        }

        /* Company Name */
        .wanhu-books-content.opt-content h4 {
            font-size: 22px;
            color: #222;
            margin-bottom: 20px;
            font-weight: 600;
        }

        /* Section Heading */
        .wanhu-books-content.opt-content h3 {
            font-size: 26px;
            color: #0d3b66;
            margin-top: 40px;
            margin-bottom: 18px;
            padding-left: 15px;
            border-left: 5px solid #0d3b66;
        }

        /* Paragraph */
        .wanhu-books-content.opt-content p {
            font-size: 16px;
            margin-bottom: 18px;
            color: #555;
        }

        /* Bold */
        .wanhu-books-content.opt-content strong {
            color: #222;
        }

        /* List */
        .wanhu-books-content.opt-content ul {
            margin: 15px 0 25px;
            padding-left: 0;
            list-style: none;
        }

        .wanhu-books-content.opt-content ul li {
            position: relative;
            padding-left: 30px;
            margin-bottom: 12px;
            color: #555;
            font-size: 16px;
        }

        .wanhu-books-content.opt-content ul li::before {
            content: "✔";
            position: absolute;
            left: 0;
            top: 1px;
            color: #28a745;
            font-weight: bold;
        }

        /* Contact Box */
        .contact-box {
            background: #f5f8fc;
            border-left: 5px solid #0d3b66;
            padding: 20px 25px;
            border-radius: 8px;
            margin: 25px 0;
        }

        .contact-box p {
            margin: 8px 0;
            font-size: 16px;
        }

        /* Links */
        .wanhu-books-content.opt-content a {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 600;
            transition: .3s;
        }

        .wanhu-books-content.opt-content a:hover {
            color: #084298;
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width:768px) {

            .wanhu-books-content.opt-content {
                padding: 25px;
                margin: 30px 15px;
            }

            .wanhu-books-content.opt-content h2 {
                font-size: 30px;
            }

            .wanhu-books-content.opt-content h3 {
                font-size: 22px;
            }

            .wanhu-books-content.opt-content h4 {
                font-size: 20px;
            }

            .wanhu-books-content.opt-content p,
            .wanhu-books-content.opt-content li {
                font-size: 15px;
            }
        }
    </style>


    <section class="inner-book text-center">
        <div class="container">
            <h1>{{ $page->name }}</h1>
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
                    <div class="wanhu-books-content opt-content">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('js')
@endsection
