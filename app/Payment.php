<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'pg_payment_id', 'sum', 'tariff', 'pg_salt', 'pg_sig', 'status', 'promocode', 'actived_at', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
