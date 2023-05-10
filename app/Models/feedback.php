<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    function transaction(){ 
        return $this->belongsTo(Transaction::class,'transaction_id','id');
    }
}
