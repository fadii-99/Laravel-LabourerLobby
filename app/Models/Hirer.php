<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\File;

class Hirer extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function file()
    {
        return $this->belongsTo(File::class);
    }
    public function hirerq()
    {
        return $this->hasMany(HireRequest::class);
    }
}
