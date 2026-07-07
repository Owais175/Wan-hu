<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;
use App\schedule;
use App\newsletter;
use App\post;
use App\banner;
use App\imagetable;
use DB;
use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;
use App\Page;
use Image;
use App\Mail\NewsletterConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribedAdmin;
use App\Mail\InquiryReceived;
use App\Mail\ThankYouMail;


class HomeController extends Controller
{
    use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // use Helper;

    public function __construct()
    {
        //$this->middleware('auth');


        $logo = imagetable::select('img_path')
            ->where('table_name', '=', 'logo')
            ->first();

        $favicon = imagetable::select('img_path')
            ->where('table_name', '=', 'favicon')
            ->first();

        View()->share('logo', $logo);
        View()->share('favicon', $favicon);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->leftJoin('product_imagess', 'products.id', '=', 'product_imagess.product_id')
            ->select('products.*', 'product_imagess.image as additional_image')
            ->get();
        $testimonial = DB::table('testimonials')->get();

        $legend_wanhu = DB::table('products')
            ->leftJoin('product_imagess', 'products.id', '=', 'product_imagess.product_id')
            ->where('products.id', 17)
            ->select('products.*', 'product_imagess.image as additional_image')
            ->first();

        $macabee_brothers = DB::table('products')
            ->leftJoin('product_imagess', 'products.id', '=', 'product_imagess.product_id')
            ->where('products.id', 19)
            ->select('products.*', 'product_imagess.image as additional_image')
            ->first();

        $farmer_dell_jezebell = DB::table('products')
            ->leftJoin('product_imagess', 'products.id', '=', 'product_imagess.product_id')
            ->where('products.id', 20)
            ->select('products.*', 'product_imagess.image as additional_image')
            ->first();

        $the_crossing = DB::table('products')
            ->leftJoin('product_imagess', 'products.id', '=', 'product_imagess.product_id')
            ->where('products.id', 21)
            ->select('products.*', 'product_imagess.image as additional_image')
            ->first();

        $books = DB::table('products')
            ->latest('created_at')
            ->take(4)
            ->get();

        foreach ($books as $book) {
            $book->image = DB::table('product_imagess')
                ->where('product_id', $book->id)
                ->value('image');
        }


        // dd($legend_wanhu);

        return view('welcome', compact('products', 'books', 'testimonial', 'legend_wanhu', 'macabee_brothers', 'farmer_dell_jezebell', 'the_crossing'));
    }

    public function legend_wanhu()
    {
        $product = DB::table('products')
            ->leftJoin('product_imagess', 'products.id', '=', 'product_imagess.product_id')
            ->where('products.id', 17)
            ->select('products.*', 'product_imagess.image as additional_image')
            ->first();
        // dd($product->product_title);

        return view('legend_wanhu', compact('product'));
    }

    public function macabee_brothers()
    {
        $product = DB::table('products')
            ->leftJoin('product_imagess', 'products.id', '=', 'product_imagess.product_id')
            ->where('products.id', 19)
            ->select('products.*', 'product_imagess.image as additional_image')
            ->first();

        return view('macabee_brothers', compact('product'));
    }

    public function farmer_dell_jezebell()
    {
        $product = DB::table('products')
            ->leftJoin('product_imagess', 'products.id', '=', 'product_imagess.product_id')
            ->where('products.id', 20)
            ->select('products.*', 'product_imagess.image as additional_image')
            ->first();

        return view('farmer_dell_jezebell', compact('product'));
    }

    public function the_crossing()
    {
        $product = DB::table('products')
            ->leftJoin('product_imagess', 'products.id', '=', 'product_imagess.product_id')
            ->where('products.id', 21)
            ->select('products.*', 'product_imagess.image as additional_image')
            ->first();

        return view('the_crossing', compact('product'));
    }



    public function about()
    {
        return view('about');
    }

    public function blogs()
    {
        $blogs = DB::table('blogs')->get();
        return view('blogs', compact('blogs'));
    }

    public function blog_detail($id)
    {
        $blogs = DB::table('blogs')->where('id', $id)->first();
        return view('blog_detail', compact('blogs'));
    }

    public function books()
    {
        $books = DB::table('products')
            ->orderBy('id', 'DESC')
            ->get();

        foreach ($books as $book) {
            $book->image = DB::table('product_imagess')
                ->where('product_id', $book->id)
                ->value('image'); // Sirf pehli image
        }

        return view('books', compact('books'));
    }

    public function book_detail($id)
    {
        $books = DB::table('products')->where('id', $id)->first();
        // dd($books);
        return view('book_detail', compact('books'));
    }

    public function terms_of_use()
    {
        return view('terms_of_use');
    }

    public function privacy_policy()
    {
        return view('privacy_policy');
    }

    public function solutions()
    {
        return view('solutions');
    }

    public function imprint()
    {
        return view('imprint');
    }

    public function contact()
    {
        return view('contact');
    }

    public function product_detail($id)
    {
        $product = DB::table('products')->where('id', $id)->get();
        // dd($product);
        // dd($product);
        return view('product-detail', compact('product'));
    }


    public function newsletterSubmit(Request $request)
    {
        $request->validate([
            'newsletter_email' => 'required|email'
        ]);

        $is_email = newsletter::where('newsletter_email', $request->newsletter_email)->count();

        if ($is_email == 0) {
            $inquiry = new newsletter;
            $inquiry->newsletter_email = $request->newsletter_email;
            $inquiry->save();


            Mail::to('mikehuckabee42@gmail.com')->send(new NewsletterSubscribedAdmin($request->newsletter_email));
            sleep(10);
            Mail::to($request->newsletter_email)->send(new NewsletterConfirmation($request->newsletter_email));



            return response()->json([
                'message' => 'Thank you for subscribing. A confirmation email has been sent!',
                'status' => true
            ]);
        } else {
            return response()->json([
                'message' => 'Email already exists',
                'status' => false
            ]);
        }
    }

    public function inquiry(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'notes' => 'required|string',
        ]);

        $inquiry = Inquiry::create($request->all());

        try {
            Mail::to('mikehuckabee42@gmail.com')->send(new InquiryReceived($inquiry));
            sleep(3);
            Mail::to($inquiry->email)->send(new ThankYouMail($inquiry));

            return response()->json([
                'status' => 'success',
                'message' => 'Your inquiry has been submitted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }
}
