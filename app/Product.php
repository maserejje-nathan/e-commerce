<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['title','description','category_id','image_link','price','condition','link','thumb','brand','cpu','ram','drive','ssd','usb','wifi','vga','hdmi','dvd','webcam','touch','graphics','availability'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
