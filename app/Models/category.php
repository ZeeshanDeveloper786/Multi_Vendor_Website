<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function section(){
        return $this->belongsTo(section::class,'section_id');
    }

    // category relation with category
    public function parentCategory(){
        return $this->belongsTo(category::class,'parent_id');
    }
    
    public function subCategories(){
        // return $this->belongsTo(category::class,'parent_id')->where('status',1);
        return $this->hasMany(category::class,'parent_id')->where('status',1);

    }
}
