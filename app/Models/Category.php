<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug'
    ];

    public function vendors(){
        return $this->hasMany('App\Models\VendorDetail');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = $this->getSlug($value);
    }

    private function getSlug($name) {
        $slug = Str::slug($name);
        $rows  = self::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get();
        $countRows = count($rows) + 1;
        return ($countRows > 1) ? "{$slug}-{$countRows}" : $slug;
    }
}
