<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';

    public function vendorPersonal(){
       return $this->belongsTo(vendor::class,'vendor_id');
    }

    public function vendorBusiness(){
       return $this->belongsTo(vendorsBusinessDetail::class,'vendor_id');
    }

    public function vendorBank(){
       return $this->belongsTo(vendorsBankDetail::class,'vendor_id');
    }
}
