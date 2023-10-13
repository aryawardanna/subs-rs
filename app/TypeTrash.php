<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeTrash extends Model
{
    use SoftDeletes;
    protected $table = 'type_trash';
    protected $fillable = [
        'photos', 'name', 'text', 'qty', 'price',
    ];

    protected $hidden = [

    ];

    public function trash(){
        return $this->hasMany(Trash::class);
    }


}
