<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

//    protected $table = 'phones';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'phone',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function client()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
