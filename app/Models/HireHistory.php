<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireHistory extends Model
{
    use HasFactory;
    public function worker()
    {
        return $this->belongsTo(Worker::class,'worker_id','id');
    }
    public function hirer()
    {
        return $this->belongsTo(Hirer::class,'hirer_id','id');
    }
}
