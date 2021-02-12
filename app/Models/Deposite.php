<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposite extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'wallet_id','invested','percent','active','duration','accrue_time'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function wallet()
    {
        return $this->belongsTo('App\Wallet');
    }
    public function transactions()
    {
        return $this->hasMany('App\Transactions');
    }

}
