<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;

class Trash extends Model
{
    use SoftDeletes;

    protected $table = 'trash';

    protected $fillable = [
        'name', 'users_id', 'price', 'description', 'slug', 'type_trash_id'
    ];

    protected $hidden = [

    ];

    public function typeTrash(){
        return $this->belongsTo(TypeTrash::class);
    }

    public function user(){
        return $this->hasOne( User::class, 'id', 'users_id');
    }

}
