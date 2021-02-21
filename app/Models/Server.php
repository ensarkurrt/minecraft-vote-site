<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $guarded = ['id','created_at','deleted_at'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
