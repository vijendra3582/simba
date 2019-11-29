<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorDetail extends Model
{

    protected $table = 'vendor_details';
    protected $fillable = [
        'user_id',
        'category_id',
        'discount',
        'registration_tenure',
        'designation_id',
        'registration_details'
    ];

    protected $casts = [
        'registration_details' => 'Array'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
