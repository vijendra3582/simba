<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'slug',
        'email', 
        'password',
        'contact',
        'role',
        'city',
        'dob',
        'security_question_id',
        'security_question_answer'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
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

    public function vendor(){
        return $this->belongsTo('App\Models\VendorDetail', 'id', 'user_id');
    }
}
