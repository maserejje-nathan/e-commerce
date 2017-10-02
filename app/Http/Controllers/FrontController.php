<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\service;
use App\slide;
use App\User;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Image;
use Illuminate\Support\Facades\DB;
use Newsletter;
use Sukohi\Maven\Maven;
use Sukohi\Maven\MavenFaq;
use Sukohi\Maven\MavenLocale;
use Sukohi\Maven\MavenTag;
use Sukohi\Maven\MavenUniqueKey;
use Fomvasss\ImageManager;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
class FrontController extends Controller
{

    use SEOToolsTrait;
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {


        $this->seo()->setTitle('Home');
        $this->seo()->setDescription('This is my page description');
        $this->seo()->opengraph()->setUrl('http://www.whitefalconug.com/');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite('@whitefalconkla');


    $agent = new Agent();

       $detect = $agent->isMobile();

        $shirts=Product::all()->take(6);

        //dd($shirts);exit;
        $users = User::all();
        $slides = slide::all();
        //$img = Image::make(public_path('/images/thumbs'.$shirt->image_link))->resize(1200,600);
        $message = '';
        $maven_items = MavenUniqueKey::with('faq.tags')
            ->neatness()
            ->smoothness()
            ->orderBy('sort')
            ->paginate(config('maven.per_page'));

        $faq =DB::table('maven_faqs')->paginate(2);
       // $model=service::all();

        //dd($slides);exit;

        $services=service::all()->take(6);

        // = DB::table('services')->take(3);
        //dd($services);exit;

        return view('front.home',compact('shirts','detect','user','faq','services','model','slides'));


    }

    public function services(){


        $services = DB::table('services')->paginate(10);


        return view('front.service',compact('services'));

    }



    public function newsletter( Request $request){

        $mail = $request->input('mail');

        //echo $mail;exit;

        Newsletter::subscribe($mail);

        //Newsletter::getMember('maserejjen@gmail.com');exit;

        return view('front.thank');
    }

    public function shirts()
    {
        $agent = new Agent();

        $detect = $agent->isMobile();

        $cat = Category::all()->pluck('name','id');

        $shirts=Product::all();
        //$brands = Product::pluck('brand', 'id');

       // dd($cat);exit;

        return view('front.shirts',compact('shirts','detect','cat'));
    }

    public function shirt($id)
    {
        $agent = new Agent();

        $detect = $agent->isMobile();

        $shirts=Product::all()->where('id','=',$id); 


       //dd($shirts);exit;


        return view('front.shirt',compact('shirts','detect'));
    }

    public function about(){

        return view('front.about');

    }

    public function faqpage(){

        $faq =DB::table('maven_faqs')->paginate(10);

        return view('front.faqpage',compact('faq'));
    }

    public function search(Request $request){

       $term = $request->searchitem;

       //dd($term);exit;

       $item = Product::where('title','LIKE','%'.$term.'%')->get();

      //dd($item);exit;





            return view('front.search_results',compact('item'));

    }

    public function warranty(){


        return view('front.warranty');

    }
    public function secure(){


        return view('front.secure');
    }

    public function deliver(){



        return view('front.delivery');
    }

}
