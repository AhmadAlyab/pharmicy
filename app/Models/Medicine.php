<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
       'name',
       'status',
       'place_where',
       'combination',
       'alternatives',
       'price'
    ];

    public function images(){
        return $this->morphMany('App\Models\Image','imageable');
    }

}
