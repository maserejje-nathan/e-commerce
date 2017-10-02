<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Image;
use Excel;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }

    public function export(){

        $catalog = Product::select('id', 'title', 'availability', 'condition','description','image_link','link','price','brand')->get();
        Excel::create('users', function($excel) use($catalog) {
            $excel->sheet('Sheet 1', function($sheet) use($catalog) {
                $sheet->fromArray($catalog);
            });
        })->export('csv');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id');

        //dd($categories);exit;
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput=$request->except('image');

//        validation
        $this->validate($request,[
            'title'=>'required',
            'price'=>'required',
            'image_link'=>'required'

        ]);
          // image upload
        $image=$request->image_link;
        $image1=$request->thumb;
        // $imageName1=$image1->getClientOriginalName();
        if($image && $image1){
            $imageName=$image->getClientOriginalName();
            $imageName1=$image1->getClientOriginalName();

            // echo $imageName;
            //echo $imageName1;exit;
            $watermark = Image::make(public_path('/images/water.png'));
            Image::make($image)->insert($watermark)->save('images/thumbs/'.$imageName);
            $formInput['image_link']=$imageName;


            $watermark = Image::make(public_path('/images/water.png'));
            Image::make($image1)->resize(500,400)->insert($watermark)->save('images/thumbs/small/'.$imageName1);
            $formInput['thumb']=$imageName1;
        }


        // dd($formInput);exit;

        Product::create($formInput);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $categories=Category::pluck('name','id');
        return view('admin.product.edit',compact(['product','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $formInput=$request->except('image');

//        validation
        $this->validate($request,[
            'title'=>'required',
            'price'=>'required',
            'image_link'=>'required',

        ]);

       // image upload
        $image=$request->image_link;
        $image1=$request->thumb;
      // $imageName1=$image1->getClientOriginalName();
        if($image && $image1){
            $imageName=$image->getClientOriginalName();
            $imageName1=$image1->getClientOriginalName();

           // echo $imageName;
             //echo $imageName1;exit;
            $watermark = Image::make(public_path('/images/water.png'));
            Image::make($image)->insert($watermark)->save('images/thumbs/'.$imageName);
            $formInput['image_link']=$imageName;


            $watermark = Image::make(public_path('/images/water.png'));
            Image::make($image1)->insert($watermark)->save('images/thumbs/small/'.$imageName1);
          $formInput['thumb']=$imageName1;
        }


         $product->update($formInput);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return back();
    }


    public function filter_price(Request $request){


       // dd($request->all());exit;

        $from = $request->from;
        $to   = $request->to;

        $product_price = Product::where('price', '<',$from)->get();

        dd($product_price);exit;

        return view('filter_result_price',compact('product_price'));
    }

    public function filter_brand(Request $request){

        $brand = $request->brand;

        $product_brand = Product::where('brand','=',$brand)->get();

        return view('filter_result_brand',compact('product_brand'));
    }

    public function filter_category(Request $request){

        $cat = $request->category;

        $product_cat = Product::where('category','=',$cat)->get();

        return view('filter_result_brand',compact('product_cat'));
    }

}
