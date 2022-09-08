<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadProduct extends Model
{
    public function category_show(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

}
