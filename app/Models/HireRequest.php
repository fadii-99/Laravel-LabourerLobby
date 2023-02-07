<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireRequest extends Model
{
    use HasFactory;
    public function hrq()
    {
        return $this->belongsTo(Hirer::class,'hirer_id','id');
    }
}
