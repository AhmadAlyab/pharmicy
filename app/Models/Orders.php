<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Medicine;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'medicine_id',
        'sender',
        'recipient',
        'status',
        'date',
        'description',
    ];
    // one(user) to many(order)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // one(medicin) to many(order)
    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}
