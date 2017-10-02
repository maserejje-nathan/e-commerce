<?php

namespace App\Http\Controllers;

use App\Product;
use App\slide;
use Illuminate\Http\Request;
use Image;

class SlideController extends Controller
{
    public function index(){

        $slides = slide::all();

    return view('admin.slide.index',compact('slides'));
    }

    public function create(){

        $products=Product::pluck('title','id');

        return view('admin.slide.create',compact('products'));
    }
    public function save(Request $request){

        //$data = $request->all();

        $formInput=$request->except('image');
        //        image upload
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();

            // echo $imageName;exit;
            $watermark = Image::make(public_path('/images/water.png'));
            $img = Image::make($image)->insert($watermark, 'bottom-right')->save('images/slides/'.$imageName);

            //$image->move('images',$imageName);
            $formInput['image']=$imageName;
        }

        //dd($formInput);exit;

        slide::create($formInput);

        return view('admin.index');
    }

    public function del($id){

        slide::destroy($id);

        return back();
    }

    public function edit($id){

        $slides=slide::find($id);
        $products=Product::pluck('title','id');
        //dd($slides);exit;
        return view('admin.slide.edit',compact(['slides','products']));
    }

    public function update(Request $request ){
            $data = $request->all();
            $id = $data['id'];
        $slides=slide::find($id);
        $formInput=$request->except('image');

//
        //        image upload
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();

            // echo $imageName;exit;
            $watermark = Image::make(public_path('/images/water.png'));
            $img = Image::make($image)->save('images/slides/'.$imageName);

            //$image->move('images',$imageName);
            $formInput['image']=$imageName;
        }

        //dd($formInput);exit;

        $slides->update($formInput);
        return redirect()->route('slide.index');

    }
}
