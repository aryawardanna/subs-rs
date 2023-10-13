<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trash extends Model
{
    use SoftDeletes;

    protected $table = 'trash';

    protected $fillable = [
        'name', 'users_id', 'price', 'description', 'slug'
    ];

    protected $hidden = [

    ];

    public function galleries(){
        return $this->hasMany( ProductGallery::class, 'products_id', 'id' );
    }

    public function user(){
        return $this->hasOne( User::class, 'id', 'users_id');
    }

}
