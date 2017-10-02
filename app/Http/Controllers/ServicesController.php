<?php

namespace App\Http\Controllers;

use App\Product;
use App\service;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{

    public function index(){

        $services=service::all();

        return view('admin.services.index',compact('services'));

    }

    public function create(){

        return view('admin.services.create');

    }

    public function save(Request $request){

        $model = service::create($request->all());

        if ($request->hasFile('image')) {
            $request->file('image')->store('public/images');

            // ensure every image has a different name
            $file_name = $request->file('image')->hashName();

            // save new image $file_name to database
            $model->update(['image' => $file_name]);
        }

// then in your view you reference the path like this:

    }

    public function destroy($id)
    {
        service::destroy($id);
        return back();
    }

    public function edit($id){

        $service=service::find($id);

        return view('admin.services.edit',compact(['service']));
    }
    public function update(Request $request){
        $data = $request->all();

        $id = $data['id'];
        $data=$request->except('image');

        $service =service::find($id);
        //        image upload
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();

            // echo $imageName;exit;
            $watermark = Image::make(public_path('/images/watermark.png'));
            $img = Image::make($image)->resize(500, 300)->insert($watermark, 'bottom-right', 10, 10)->save('images/thumbs/'.$imageName);

            //$image->move('images',$imageName);
            $data['image']=$imageName;
        }

        $service->update($data);

        return redirect()->route('services');
    }

}
