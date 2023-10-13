<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTrash extends Model
{
    protected $table = 'type_trash';
    protected $fillable = [
        'photos', 'name', 'text'
    ];

    protected $hidden = [

    ];

    public function trash(){
        return $this->hasMany(Trash::class);
    }


}
