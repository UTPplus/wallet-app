<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $fillable=['type','user_id','wallet_id','deposite_id','amount'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
